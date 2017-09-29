<?php
namespace App\Repositories;

use Exception;
use DB;

abstract class BaseRepository
{
    protected $model;
    const PER_PAGE = 10;

    abstract function __construct();

    public function index($attributes = ['*'])
    {
        $data = $this->model->select($attributes)->paginate(self::PER_PAGE);

        return $data;
    }

    public function all($subject, $options = [])
    {
        $limit = isset($options['limit']) ? $options['limit'] : self::PER_PAGE;
        $order = isset($options['order']) ? $options['order'] : ['key' => 'id', 'aspect' => 'DESC'];
        $filter = isset($options['filter']) ? $options['filter'] : [];

        $rows = $this->model->where($filter)->orderBy($order['key'], $order['aspect'])->paginate($limit);
        $data['subject'] = $subject;
        $data['columns'] = isset($options['columns']) ? $options['columns'] : $this->model->getFillable();
        array_unshift($data['columns'], 'id');

        if (count($rows)) {
            $data['ids'] = [];
            foreach ($rows as $key => $row) {
                $data['ids'][$key] = $row['id'];
                $rows[$key] = $row->where('id', $row['id'])->first($data['columns']);
            }
            $data['from'] = ($rows->currentPage() - 1) * $limit + 1;
            $data['to'] = $data['from'] + $rows->count() - 1;
        }
        $data['total'] = $rows->total();
        $data['rows'] = $rows;

        return $data;
    }

    public function show($id, $options = [])
    {
        $data = $this->model->where($options)->find($id);

        return $data;
    }

    public function store($input)
    {
        $data = $this->model->create($input);

        return $data;
    }

    public function update($input, $id)
    {
        $data = $this->model->where('id', $id)->update($input);

        return $id;
    }

    public function delete($ids)
    {
        try {
            DB::beginTransaction();
            $data = $this->model->destroy($ids);
            DB::commit();

            return $data;
        } catch (Exception $ex) {
            DB::rollBack();
            return ['error' => $ex->getMessage()];
        }
    }

    public function uploadImage($input, $imageField, $id = null)
    {
        if (empty($input['image_hidden'])) {
            if (isset($input['image'])) {
                if (!empty($id)) {
                    $data = $this->model->find($id);
                    if (!empty($data[$imageField]) && file_exists(public_path($data[$imageField]))) {
                        unlink(public_path($data[$imageField]));
                    }
                }
                $destination = public_path(config('common.user.avatar_path'));
                $name = md5($id) . uniqid() . $input['image']->getClientOriginalName();
                $file = $input['image']->move($destination, $name);
                $checkError = $input['image']->getError();
                if ($checkError != "UPLOADERROK") {
                    return ['error' => trans('message.file_error')];
                }
                $input[$imageField] = config('common.user.avatar_path') . $file->getFilename();
            } else {
                $input[$imageField] = config('common.user.default_avatar');
            }
        }

        unset($input['image_hidden']);

        if ($imageField != 'image') {
            unset($input['image']);
        }

        return $input;
    }

    public function lists($filters = [])
    {
        $data = $this->model->where($filters)->lists('name', 'id');

        return $data;
    }
}
