export const getProducts = (params) => axios.get('/products', { params })
export const getProduct = (params, sku) => axios.get(`/products/${sku}`, { params })

export const getFeaturedProducts = (params) => axios.get('/featured-products', {params})

export const getRecommendedProducts = (params) => axios.get('/recommended-products', {params})
