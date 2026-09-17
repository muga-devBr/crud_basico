import { defineConfig } from 'vite';

export default defineConfig({
  server: {
    port: 8080,
    strictPort: true,
  },

  build: {
    outDir: '../dist',
    emptyOutDir: true,
  }
});

