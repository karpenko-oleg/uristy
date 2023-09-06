
window.addEventListener('load', async() =>{
    if (navigator.serviceWorker){
        try {
            const reg = await navigator.serviceWorker.register('./sw.js')
            console.log('service worker register success', reg)
        } catch (e){
            console.log('service worker register fail')
        }
        
    }
})
// onclic unistall
let deferredPrompt;

window.addEventListener('beforeinstallprompt', (e) => {
    deferredPrompt = e;
});

const installApp = document.getElementById('installApp');

installApp.addEventListener('click', async () => {
    if (deferredPrompt !== null) {
        deferredPrompt.prompt();
        const { outcome } = await deferredPrompt.userChoice;
        if (outcome === 'accepted') {
            deferredPrompt = null;
        }
    }
});

