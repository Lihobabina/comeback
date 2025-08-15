const canvasHero = document.getElementById('canvas3d-hero');
if (canvasHero) {
    import(splineData.baseUrl + 'home-hero/runtime.js').then(({ Application }) => {
        const app = new Application(canvasHero, { wasmPath: splineData.baseUrl + 'home-hero/' });
        app.load(splineData.baseUrl + 'home-hero/scene.splinecode');
    });
}
