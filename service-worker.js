/**
 * Copyright 2016 Google Inc. All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
*/

// DO NOT EDIT THIS GENERATED OUTPUT DIRECTLY!
// This file should be overwritten as part of your build process.
// If you need to extend the behavior of the generated service worker, the best approach is to write
// additional code and include it using the importScripts option:
//   https://github.com/GoogleChrome/sw-precache#importscripts-arraystring
//
// Alternatively, it's possible to make changes to the underlying template file and then use that as the
// new base for generating output, via the templateFilePath option:
//   https://github.com/GoogleChrome/sw-precache#templatefilepath-string
//
// If you go that route, make sure that whenever you update your sw-precache dependency, you reconcile any
// changes made to this original template file with your modified copy.

// This generated service worker JavaScript will precache your site's resources.
// The code needs to be saved in a .js file at the top-level of your site, and registered
// from your pages in order to be used. See
// https://github.com/googlechrome/sw-precache/blob/master/demo/app/js/service-worker-registration.js
// for an example of how you can register this script and handle various service worker events.

/* eslint-env worker, serviceworker */
/* eslint-disable indent, no-unused-vars, no-multiple-empty-lines, max-nested-callbacks, space-before-function-paren, quotes, comma-spacing */
'use strict';

var precacheConfig = [["README.md","3af6e2027173be9d9c57cd69ba1fa8cd"],["composer.json","5c5d5ed8e2c0e67bf6634dc0514f60be"],["composer.lock","f4951b32f9b88b833894e17ae9402c05"],["contact.php","248c8087dd74157a89d078ec3023bef5"],["email.php","4b27915909d0b4376eb79cabab515070"],["emailtest2.php","bbdfa7b19cad50266bdbb9120892b99a"],["fichier.txt","d41d8cd98f00b204e9800998ecf8427e"],["footer.php","7c759e2623469dc685751030e9ba83fc"],["formations-base.php","290ba667b01915ead1a3f30800795b88"],["formations-commis.php","675fa8730c43a19626fbcbffcaa6d8b8"],["formations.php","124a7f6f849af864cd9379a801ab7406"],["header.php","d36256c77d792d87394235e8bd403de5"],["images/bxlformat.jpg","6b6050ef555aa498c43b394a0aab51e4"],["images/bxlformat2.png","d9dffa4248d4539e380b6b53eaf45853"],["images/cocof.gif","73785d453dd5251cfa55e98814d991f1"],["images/cocof2.png","46d3a1df6cff941784cc3fc1d95113a5"],["images/favicon.png","7dec8fc4944556ca7ad9b4df4a8177fc"],["images/favicon128x128.png","79fb5e4afd7a0be79764b108f3c83a24"],["images/favicon512x512.png","7dec8fc4944556ca7ad9b4df4a8177fc"],["images/febisp1.jpg","5d6416a398ae57de802922f66a7ee47e"],["images/febisp2.png","1c2945d64af601f7e85aab71ecfc3206"],["images/fse2.png","778f02a680cfb29c709f4c2faf07e1db"],["images/fse3.jpg","3bade534ebd69fd310ce55241f21c34f"],["images/header_nappe_800x380.jpg","6b12a9bce4beac9ae571b3a8deec9d6e"],["images/header_plate.png","ed25dde41ebcc3de2c4d2bf7486305d0"],["images/header_plate2.png","fa8617edf7384c3feee48308d994166b"],["images/header_plate3.png","377aa9c75966a0381ffa3975bccdf3a2"],["images/logo.png","17496159a1914670c9b05088c703103b"],["images/orbem.jpg","52c26f4f8c6d0d19ad8fceb95c02029c"],["images/resto.jpg","6cbfe1a97e61d61546d0151ee8392bf8"],["images/ri.gif","5d2be3b561bdde1083722e37c8881af6"],["images/wood.jpg","75ef601bd1527d7c8a944d984888c78c"],["index.php","57e63a8745a500e4f13eb4dfa8490b09"],["manifest.json","f2680af0eed671bfc6a09df8a70f4a4a"],["menu.php","1b87e596baee48b519229c415faa9ea3"],["style.css","6e24f8da57952dd8360d897272309ad0"],["upload-image.php","49fc8d0317e393e2c144a7758d64a5f3"],["vendor/autoload.php","0174033bb486bef69f17f6b7b8141b3f"],["vendor/composer/ClassLoader.php","7bcd58ef2df6fe97165bea70fe9c7712"],["vendor/composer/autoload_classmap.php","8645d3a4e3ad87e7cf4d88a46717aab4"],["vendor/composer/autoload_namespaces.php","35e12c7d76c4a81633bcf547c0e229a9"],["vendor/composer/autoload_psr4.php","bef49c9294d2e96895a4c28fd166a876"],["vendor/composer/autoload_real.php","9e7f193749a8a114a5cc2445a6fb12bc"],["vendor/composer/autoload_static.php","4c79f398720b352662e2c54dcff6d858"],["vendor/composer/installed.json","4581971c6c7ec9dcc712f25a239386b4"],["vendor/phpmailer/phpmailer/README.md","940d9ba78de02f99713dc4cba7cf853f"],["vendor/phpmailer/phpmailer/SECURITY.md","5202468726f825a4ac72e4e93fca6d09"],["vendor/phpmailer/phpmailer/get_oauth_token.php","0bebd0991f833d404eae1f4169f12d03"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-am.php","46dcd505d56a950198d9aa84385f94a2"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-ar.php","312e3d6b9b67338bdbe8cdce5c911278"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-az.php","56d774311cad93c3935f7e0bae385c31"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-ba.php","288d90dc839febcb80f24ef24dd91a7b"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-be.php","ed20568de7c20ec102935043c8201af2"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-bg.php","20589ae4ffe53e701190e19794731e82"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-ca.php","632c0caa936fa9575f6a089c84ffd2cc"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-ch.php","94100d2b2dc17ac67579a4499a13d9c2"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-cs.php","3b2be0a69d0f145ccd7288d31131b043"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-da.php","2f2b474f532ab2ee3d92395f3c5b0e0c"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-de.php","e76eef12bcc910c9fb7b6f4c6781658b"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-el.php","a05aa8b2f630a31493922b24b4b93b2e"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-eo.php","c2ac8c3ea177248b481c66e5b4c6a463"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-es.php","2868a1611e605385f5e8a0a0c39976af"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-et.php","fa5e67af621d49a64d8766a8a5c55386"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-fa.php","62ee650e737866d7b819d8f349db92e6"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-fi.php","2a9b439722f490ae350f7dbc25198d79"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-fo.php","cfd27a7f91f0f4f2a4846cc10839dfd6"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-fr.php","f15bc9c06bdbd0532cceabc75784bd46"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-gl.php","b2ca56ae4030b23dad54fcd1770838bc"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-he.php","18049afa12f6341a28464a8240547496"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-hi.php","9c16e72cdef57089e3111a58382d2d9e"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-hr.php","0b2a5b47bd0b46eb7cbf43b531229539"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-hu.php","b562487c73f60e245d1a1671dc9c1573"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-id.php","d33f3b2facdea271b3506d3946f80684"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-it.php","2343321d68a0f537731094d94cb018ce"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-ja.php","3cd5d83da61896f05af3b0e3afc4120f"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-ka.php","dde630065bad8dfef600c47eecfca2c2"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-ko.php","58a5b654f0322ba94713956e9fe2cbde"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-lt.php","95d8e64b4ea89cf7429053f2191b4c56"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-lv.php","70881d6b394785c9c85bfeca355c7e45"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-ms.php","d3bf25210a06e7ab8b407f140d5d6612"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-nb.php","47a1156689dd8d71488d19feb4e2a957"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-nl.php","f1bbf9fa400300827982247005eedd16"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-pl.php","ddbd3d779da4c2a86964361665248b79"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-pt.php","e43a3661566d39f7f6094905c5fa142e"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-pt_br.php","48dd712cfb4932969171d7f49308ce8f"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-ro.php","97dd1085d2495783b04790f9a6d5190f"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-rs.php","563da4ca11458562b6e938bc7742248a"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-ru.php","ab761bc79974a307b6d482f361c9a70a"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-sk.php","c7ba3b001f45220f9aa7cd6e4101f58c"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-sl.php","da14fff5b9752f8a14be805703fb5e50"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-sv.php","ea5c4060572ebb34b0e409206af22d5a"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-tr.php","0b9b8615f536f95ec22381707441fbe6"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-uk.php","60cf6cf5d5380e7573bed1f2039a6fb6"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-vi.php","13ac94e759a8baeb4f8b6d186ed9a0b6"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-zh.php","4099efcb36a6e5609d30d5498fa5c6ff"],["vendor/phpmailer/phpmailer/language/phpmailer.lang-zh_cn.php","f29e829c90e3f89bcd1fc29f9cf58ea4"],["vendor/phpmailer/phpmailer/src/Exception.php","89150e124021d4814e1456eb6290f3f3"],["vendor/phpmailer/phpmailer/src/OAuth.php","982ffd225fdc01a3b80a3c1fec2155a8"],["vendor/phpmailer/phpmailer/src/PHPMailer.php","b771fddb588379917d54dee66bed3ed6"],["vendor/phpmailer/phpmailer/src/POP3.php","b751761c7421d3a0113725b2b1ab773c"],["vendor/phpmailer/phpmailer/src/SMTP.php","4fbdc1952dba7d7cb54e575515642af2"],["vieux-contact.php","f6f34b1971d79b6703b0833d8a7cbd59"]];
var cacheName = 'sw-precache-v3-sw-precache-' + (self.registration ? self.registration.scope : '');


var ignoreUrlParametersMatching = [/^utm_/];



var addDirectoryIndex = function (originalUrl, index) {
    var url = new URL(originalUrl);
    if (url.pathname.slice(-1) === '/') {
      url.pathname += index;
    }
    return url.toString();
  };

var cleanResponse = function (originalResponse) {
    // If this is not a redirected response, then we don't have to do anything.
    if (!originalResponse.redirected) {
      return Promise.resolve(originalResponse);
    }

    // Firefox 50 and below doesn't support the Response.body stream, so we may
    // need to read the entire body to memory as a Blob.
    var bodyPromise = 'body' in originalResponse ?
      Promise.resolve(originalResponse.body) :
      originalResponse.blob();

    return bodyPromise.then(function(body) {
      // new Response() is happy when passed either a stream or a Blob.
      return new Response(body, {
        headers: originalResponse.headers,
        status: originalResponse.status,
        statusText: originalResponse.statusText
      });
    });
  };

var createCacheKey = function (originalUrl, paramName, paramValue,
                           dontCacheBustUrlsMatching) {
    // Create a new URL object to avoid modifying originalUrl.
    var url = new URL(originalUrl);

    // If dontCacheBustUrlsMatching is not set, or if we don't have a match,
    // then add in the extra cache-busting URL parameter.
    if (!dontCacheBustUrlsMatching ||
        !(url.pathname.match(dontCacheBustUrlsMatching))) {
      url.search += (url.search ? '&' : '') +
        encodeURIComponent(paramName) + '=' + encodeURIComponent(paramValue);
    }

    return url.toString();
  };

var isPathWhitelisted = function (whitelist, absoluteUrlString) {
    // If the whitelist is empty, then consider all URLs to be whitelisted.
    if (whitelist.length === 0) {
      return true;
    }

    // Otherwise compare each path regex to the path of the URL passed in.
    var path = (new URL(absoluteUrlString)).pathname;
    return whitelist.some(function(whitelistedPathRegex) {
      return path.match(whitelistedPathRegex);
    });
  };

var stripIgnoredUrlParameters = function (originalUrl,
    ignoreUrlParametersMatching) {
    var url = new URL(originalUrl);
    // Remove the hash; see https://github.com/GoogleChrome/sw-precache/issues/290
    url.hash = '';

    url.search = url.search.slice(1) // Exclude initial '?'
      .split('&') // Split into an array of 'key=value' strings
      .map(function(kv) {
        return kv.split('='); // Split each 'key=value' string into a [key, value] array
      })
      .filter(function(kv) {
        return ignoreUrlParametersMatching.every(function(ignoredRegex) {
          return !ignoredRegex.test(kv[0]); // Return true iff the key doesn't match any of the regexes.
        });
      })
      .map(function(kv) {
        return kv.join('='); // Join each [key, value] array into a 'key=value' string
      })
      .join('&'); // Join the array of 'key=value' strings into a string with '&' in between each

    return url.toString();
  };


var hashParamName = '_sw-precache';
var urlsToCacheKeys = new Map(
  precacheConfig.map(function(item) {
    var relativeUrl = item[0];
    var hash = item[1];
    var absoluteUrl = new URL(relativeUrl, self.location);
    var cacheKey = createCacheKey(absoluteUrl, hashParamName, hash, false);
    return [absoluteUrl.toString(), cacheKey];
  })
);

function setOfCachedUrls(cache) {
  return cache.keys().then(function(requests) {
    return requests.map(function(request) {
      return request.url;
    });
  }).then(function(urls) {
    return new Set(urls);
  });
}

self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(cacheName).then(function(cache) {
      return setOfCachedUrls(cache).then(function(cachedUrls) {
        return Promise.all(
          Array.from(urlsToCacheKeys.values()).map(function(cacheKey) {
            // If we don't have a key matching url in the cache already, add it.
            if (!cachedUrls.has(cacheKey)) {
              var request = new Request(cacheKey, {credentials: 'same-origin'});
              return fetch(request).then(function(response) {
                // Bail out of installation unless we get back a 200 OK for
                // every request.
                if (!response.ok) {
                  throw new Error('Request for ' + cacheKey + ' returned a ' +
                    'response with status ' + response.status);
                }

                return cleanResponse(response).then(function(responseToCache) {
                  return cache.put(cacheKey, responseToCache);
                });
              });
            }
          })
        );
      });
    }).then(function() {
      
      // Force the SW to transition from installing -> active state
      return self.skipWaiting();
      
    })
  );
});

self.addEventListener('activate', function(event) {
  var setOfExpectedUrls = new Set(urlsToCacheKeys.values());

  event.waitUntil(
    caches.open(cacheName).then(function(cache) {
      return cache.keys().then(function(existingRequests) {
        return Promise.all(
          existingRequests.map(function(existingRequest) {
            if (!setOfExpectedUrls.has(existingRequest.url)) {
              return cache.delete(existingRequest);
            }
          })
        );
      });
    }).then(function() {
      
      return self.clients.claim();
      
    })
  );
});


self.addEventListener('fetch', function(event) {
  if (event.request.method === 'GET') {
    // Should we call event.respondWith() inside this fetch event handler?
    // This needs to be determined synchronously, which will give other fetch
    // handlers a chance to handle the request if need be.
    var shouldRespond;

    // First, remove all the ignored parameters and hash fragment, and see if we
    // have that URL in our cache. If so, great! shouldRespond will be true.
    var url = stripIgnoredUrlParameters(event.request.url, ignoreUrlParametersMatching);
    shouldRespond = urlsToCacheKeys.has(url);

    // If shouldRespond is false, check again, this time with 'index.html'
    // (or whatever the directoryIndex option is set to) at the end.
    var directoryIndex = 'index.html';
    if (!shouldRespond && directoryIndex) {
      url = addDirectoryIndex(url, directoryIndex);
      shouldRespond = urlsToCacheKeys.has(url);
    }

    // If shouldRespond is still false, check to see if this is a navigation
    // request, and if so, whether the URL matches navigateFallbackWhitelist.
    var navigateFallback = '';
    if (!shouldRespond &&
        navigateFallback &&
        (event.request.mode === 'navigate') &&
        isPathWhitelisted([], event.request.url)) {
      url = new URL(navigateFallback, self.location).toString();
      shouldRespond = urlsToCacheKeys.has(url);
    }

    // If shouldRespond was set to true at any point, then call
    // event.respondWith(), using the appropriate cache key.
    if (shouldRespond) {
      event.respondWith(
        caches.open(cacheName).then(function(cache) {
          return cache.match(urlsToCacheKeys.get(url)).then(function(response) {
            if (response) {
              return response;
            }
            throw Error('The cached response that was expected is missing.');
          });
        }).catch(function(e) {
          // Fall back to just fetch()ing the request if some unexpected error
          // prevented the cached response from being valid.
          console.warn('Couldn\'t serve response for "%s" from cache: %O', event.request.url, e);
          return fetch(event.request);
        })
      );
    }
  }
});







