export const getProducts = (params) => axios.get('/products', { params })
export const getProduct = (params, sku) => axios.get(`/products/${sku}`, { params })
