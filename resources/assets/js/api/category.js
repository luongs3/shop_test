export const getCategories = (params) => axios.get('/categories', { params })
export const getCategory = (params, sku) => axios.get(`/categories/${sku}`, {params})

export const getFeaturedCategories = (params) => axios.get('/featured-categories', { params })
