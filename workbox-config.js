module.exports = {
    "globDirectory": "/",
    "globPatterns": [
        "**/*.{js,php,css,png,jpg,json,txt,ico,mp3,dll,exe,md,bat,snapshot,scss}"
    ],
    "swDest": "sw.js",
    //Define runtime caching rules.
    runtimeCaching: [{
        // Match any request that ends with .png, .jpg, .jpeg or .svg.
        urlPattern: /\.(?:png|jpg|jpeg|svg)$/,

        // Apply a cache-first strategy.
        handler: 'CacheFirst',

        options: {
            // Use a custom cache name.
            cacheName: 'images',

            // Only cache 10 images.
            expiration: {
                maxEntries: 10,
            },
        },
    }],

};