/**
 * functions to support PUSH notifications (PN) on user client
 */

/**
 * subscribe Push notifications (PN)
 * - check, if PN's are available
 * - request users permission, if not done so far
 * - register service worker, if permisson is granted  
 */
async function pnSubscribe() {
    if (pnAvailable()) {
        // if not granted or denied so far...
        if (window.Notification.permission === "default") {
            await window.Notification.requestPermission();
        }
        if (Notification.permission === 'granted') {
            // register service worker
            await pnRegisterSW();
        }
    }
}

/**
 * helper while testing
 * unsubscribe Push notifications
 */
async function pnUnsubscribe() {
    var swReg = null;
    if (pnAvailable()) {
        // unfortunately there is no function to reset Notification permission...
        // unregister service worker
        await pnUnregisterSW();
    }
}

/**
 * helper while testing
 * update service worker.
 * works not correct on each browser/os -> sometimes brwoser have to
 * be restarted to update service worker
 */
async function pnUpdate() {
    var swReg = null;
    if (pnAvailable()) {
        // unfortunately there is no function to reset Notification permission...
        // unregister service worker
        await pnUpdateSW();
    }
}

/**
 * helper while testing
 * check if PN already subscribed
 */
async function pnSubscribed() {
    var swReg = undefined;
    if (pnAvailable()) {
        swReg = await navigator.serviceWorker.getRegistration();
    }
    return (swReg != undefined);
}

/**
 * checks whether all requirements for PN are met
 * 1. have to run in secure context
 *    - window.isSecureContext = true
 * 2. browser should implement at least
 *    - navigatpr.serviceWorker
 *    - window.PushManager
 *    - window.Notification
 *    
 * @returns boolen
 */
function pnAvailable() {
    var bAvailable = false;
    if (window.isSecureContext) {
		// running in secure context - check for available Push-API
        bAvailable = (('serviceWorker' in navigator) && 
		              ('PushManager' in window) && 
					  ('Notification' in window)); 
    } else {
        console.log('site have to run in secure context!');
    }
    return bAvailable;
}

/**
 * register the service worker.
 * there is no check for multiple registration necessary - browser/Push-API
 * takes care if same service-worker ist already registered
 */
async function pnRegisterSW() {
    navigator.serviceWorker.register('PNServiceWorker.js')
        .then((swReg) => {
            // registration worked
            console.log('Registration succeeded. Scope is ' + swReg.scope);
        }).catch((error) => {
            // registration failed
            console.log('Registration failed with ' + error);
        });
}

/**
 * helper while testing
 * unregister the service worker.
 */
async function pnUnregisterSW() {
    navigator.serviceWorker.getRegistration()
        .then(function(reg) {
            reg.unregister()
                .then(function(bOK) {
                    if (bOK) {
                        console.log('unregister service worker succeeded.');
                    } else {
                        console.log('unregister service worker failed.');
                    }
                });
        });
}

/**
 * helper while testing
 * update service worker.
 */
async function pnUpdateSW() {
    navigator.serviceWorker.getRegistration()
        .then(function(reg) {
            reg.update()
                .then(function(bOK) {
                    if (bOK) {
                        console.log('update of service worker succeeded.');
                    } else {
                        console.log('update of service worker failed.');
                    }
                });
        });
}
