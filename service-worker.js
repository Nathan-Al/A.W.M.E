console.log("Service worker : (whisper) I'm in");

importScripts('https://storage.googleapis.com/workbox-cdn/releases/6.0.2/workbox-sw.js');
const { strategies } = workbox;
const { CacheFirst } = workbox.strategies;
const { CacheableResponse } = workbox.cacheableResponse;
const { navigationPreload } = workbox;
const { registerRoute, NavigationRoute } = workbox.routing;
const { NetworkOnly } = workbox.strategies;
console.log(navigationPreload)

let CACHE_OFF = 'offline-page';
let CACHE_NAME = 'my-site-cache-v1';
let CACHE_PAGE = 'cache-page';
let CACHE_IMAGE = 'cache-image';
let urlsToCache = [
    '/',
    'Css/all.css',
    'Scripts/index.js',
    'Vue/affichage-index.php',
    'media-site',
    'Public/fontawesome/all.js'
];
const FALLBACK_HTML_URL = 'Vue/affichage-offline.php';

workbox.routing.registerRoute(
    ({ request }) => request.destination === 'image',
    new CacheFirst({
        cacheName: 'images',
        plugins: [
            new workbox.expiration.ExpirationPlugin({
                maxEntries: 60,
                maxAgeSeconds: 30 * 24 * 60 * 60, // 30 Days
            }),
        ],
    })
);

workbox.routing.registerRoute(
    ({ request }) => request.destination === 'script' ||
    request.destination === 'style',
    new workbox.strategies.StaleWhileRevalidate({
        cacheName: 'static-resources',
    })
);

self.addEventListener('install', function(event) {
    // Perform install steps
    console.log("Service worker : Install trigger")
    event.waitUntil(
        caches.open(CACHE_NAME)
        .then(function(cache) {
            console.log('Opened cache');
            return cache.addAll(urlsToCache);
        })
    );
    event.waitUntil(
        caches.open(CACHE_OFF).then(
            (cache) => cache.add(FALLBACK_HTML_URL)
        )
    );
});

navigationPreload.enable();

const networkOnly = new NetworkOnly();
const navigationHandler = async(params) => {
    try {
        // Attempt a network request.
        return await networkOnly.handle(params);
    } catch (error) {
        // If it fails, return the cached HTML.
        return caches.match(FALLBACK_HTML_URL, {
            cacheName: CACHE_OFF,
        });
    }
};

// Register this strategy to handle all navigations.
registerRoute(
    new NavigationRoute(navigationHandler)
);


self.addEventListener('fetch', function(event) {
    console.log("Service worker : fetch detecter")
    event.respondWith(caches.match(event.request).then(function(response) {
        // Si il trouve un cache correspondant a la demande il l'envoie
        if (response) {
            return response;
        }
        return fetch(event.request).then(
            function(response) {
                // Check if we received a valid response
                if (!response || response.status !== 200 || response.type !== 'basic') {
                    return response;
                }

                // IMPORTANT: Clone the response. A response is a stream
                // and because we want the browser to consume the response
                // as well as the cache consuming the response, we need
                // to clone it so we have two streams.
                var responseToCache = response.clone();

                caches.open(CACHE_NAME)
                    .then(function(cache) {
                        cache.put(event.request, responseToCache);
                    });

                return response;
            }
        );
    }));
});

// Catch routing errors, like if the user is offline
workbox.routing.setCatchHandler(async({ event }) => {
    // Return the precached offline page if a document is being requested
    if (event.request.destination === 'document') {
        return matchPrecache('/Vue/affichage-offline.php');
    }

    return Response.error();
});


/*console.log("PWA : Service worker ready !");

self.addEventListener('install', function(e) {
    console.log(e)
});

self.addEventListener('activate', function(e) {
    console.log(e)
});

self.addEventListener('fetch', function(e) {
    console.log(e)
});
*/