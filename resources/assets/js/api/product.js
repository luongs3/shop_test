export const getProducts = (params) => axios.get('/products', { params })
export const getProduct = (sku) => axios.get(`/products/${sku}`)

export const getFeaturedProducts = (params) => axios.get('/featured-products', {params})

export const getRecommendedProducts = (params) => axios.get('/recommended-products', {params})
