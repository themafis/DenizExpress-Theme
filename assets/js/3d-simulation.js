/**
 * DNZ Express 3D Neural Network Simulation
 * Creates a highly professional, pulsating neural web.
 */

document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('hero-3d-canvas');
    if (!canvas) return;

    setTimeout(initSimulation, 100);

    function initSimulation() {
        const scene = new THREE.Scene();
        scene.fog = new THREE.FogExp2(0x000000, 0.0015);

        const camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

        const particleCount = window.innerWidth < 768 ? 60 : 120;
        const maxDistance = 70;

        const geometry = new THREE.BufferGeometry();
        const positions = new Float32Array(particleCount * 3);
        const velocities = [];
        const phases = [];

        for (let i = 0; i < particleCount; i++) {
            positions[i * 3] = (Math.random() - 0.5) * 400;
            positions[i * 3 + 1] = (Math.random() - 0.5) * 300;
            positions[i * 3 + 2] = (Math.random() - 0.5) * 200 - 50;

            velocities.push({
                x: (Math.random() - 0.5) * 0.15,
                y: (Math.random() - 0.5) * 0.15,
                z: (Math.random() - 0.5) * 0.15
            });

            phases.push(Math.random() * Math.PI * 2);
        }

        geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

        const material = new THREE.PointsMaterial({
            color: 0xFF6B00,
            size: 3,
            transparent: true,
            opacity: 0.9,
            blending: THREE.AdditiveBlending
        });

        const particles = new THREE.Points(geometry, material);
        scene.add(particles);

        const linesGeometry = new THREE.BufferGeometry();
        const maxLines = particleCount * 20; 
        const linePositions = new Float32Array(maxLines * 6);

        linesGeometry.setAttribute('position', new THREE.BufferAttribute(linePositions, 3));

        const linesMaterial = new THREE.LineBasicMaterial({
            color: 0xFF6B00,
            transparent: true,
            opacity: 0.25,
            blending: THREE.AdditiveBlending,
            depthWrite: false
        });

        const linesMesh = new THREE.LineSegments(linesGeometry, linesMaterial);
        scene.add(linesMesh);

        camera.position.z = 150;

        let mouseX = 0;
        let mouseY = 0;

        document.addEventListener('mousemove', (event) => {
            mouseX = (event.clientX - window.innerWidth / 2) * 0.08;
            mouseY = (event.clientY - window.innerHeight / 2) * 0.08;
        });

        let time = 0;

        function animate() {
            requestAnimationFrame(animate);
            time += 0.01;

            camera.position.x += (mouseX - camera.position.x) * 0.03;
            camera.position.y += (-mouseY - camera.position.y) * 0.03;
            camera.lookAt(scene.position);

            const positions = particles.geometry.attributes.position.array;
            let vertexpos = 0;
            let numConnected = 0;

            for (let i = 0; i < particleCount; i++) {
                const pulse = Math.sin(time * 2 + phases[i]) * 0.2;
                
                positions[i * 3] += velocities[i].x + pulse * 0.05;
                positions[i * 3 + 1] += velocities[i].y + pulse * 0.05;
                positions[i * 3 + 2] += velocities[i].z;

                if (positions[i * 3] > 200 || positions[i * 3] < -200) velocities[i].x *= -1;
                if (positions[i * 3 + 1] > 150 || positions[i * 3 + 1] < -150) velocities[i].y *= -1;
                if (positions[i * 3 + 2] > 50 || positions[i * 3 + 2] < -150) velocities[i].z *= -1;

                for (let j = i + 1; j < particleCount; j++) {
                    const dx = positions[i * 3] - positions[j * 3];
                    const dy = positions[i * 3 + 1] - positions[j * 3 + 1];
                    const dz = positions[i * 3 + 2] - positions[j * 3 + 2];
                    const distSq = dx * dx + dy * dy + dz * dz;

                    if (distSq < maxDistance * maxDistance) {
                        linePositions[vertexpos++] = positions[i * 3];
                        linePositions[vertexpos++] = positions[i * 3 + 1];
                        linePositions[vertexpos++] = positions[i * 3 + 2];

                        linePositions[vertexpos++] = positions[j * 3];
                        linePositions[vertexpos++] = positions[j * 3 + 1];
                        linePositions[vertexpos++] = positions[j * 3 + 2];

                        numConnected++;
                    }
                }
            }

            particles.geometry.attributes.position.needsUpdate = true;
            
            linesMesh.geometry.setDrawRange(0, numConnected * 2);
            linesMesh.geometry.attributes.position.needsUpdate = true;
            
            particles.rotation.y = Math.sin(time * 0.1) * 0.1;
            linesMesh.rotation.y = Math.sin(time * 0.1) * 0.1;
            particles.rotation.x = Math.cos(time * 0.1) * 0.1;
            linesMesh.rotation.x = Math.cos(time * 0.1) * 0.1;

            renderer.render(scene, camera);
        }

        animate();

        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    }
});
