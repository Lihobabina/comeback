const canvas = document.getElementById('canvas3d');
if (canvas) {
    import(splineData.baseUrl + 'robot/runtime.js').then(({ Application }) => {
        const app = new Application(canvas, { wasmPath: splineData.baseUrl + 'robot/' });
        app.load(splineData.baseUrl + 'robot/scene.splinecode');
    });
}
