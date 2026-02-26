let mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
// const HtmlInjector = require('bs-html-injector');\
const fs = require('fs');
const path = require('path');
mix.webpackConfig({
    plugins: [
        new BrowserSyncPlugin({
            host: 'localhost',
            port: 3000,
            proxy: "https://absolute-health.ddev.site",
            tunnel: true,
            open: false,
            notify: true,
            files: ["dist/**"],
            plugins: [
                {
                    module: "bs-html-injector",
                    options: {
                        files: "./includes/blocks/fifty-fifty-block/template.php",
                    }
                }
            ], 
        })
    ],
    module: {
        rules: [
            {
                test: /\.scss/,
                loader: 'import-glob-loader'
            }
        ]
    }
})
// Compile main.js as before
.js('./js/main.js', './dist/main.min.js')
    // Compile main.scss
    .sass('./scss/main.scss', './dist/main.min.css', {
        sassOptions: {
            outputStyle: 'compressed',
        }
    })
    // Compile _editor-styles.scss
    .sass('./scss/_editor-styles.scss', './dist/editor-styles.min.css', {
        sassOptions: {
            outputStyle: 'compressed',
        }
    });

// Automatically compile every .js file in ./js to ./dist/[filename].min.js
const jsDir = './js';
fs.readdirSync(jsDir).forEach(file => {
    if (
        file.endsWith('.js') &&
        file !== 'main.js' // Exclude main.js since it's already handled above
    ) {
        const src = path.join(jsDir, file);
        const name = path.parse(file).name;
        const out = `./dist/${name}.min.js`;
        mix.js(src, out);
    }
});


// Function to add all blocks
function mixBlocks(directory) {
    fs.readdirSync(directory).forEach(file => {
        const absolute = path.join(directory, file);
    
        if (fs.statSync(absolute).isDirectory()) {
            if (absolute.indexOf('dist') > -1) {
                return;
            } else {
                mixBlocks(absolute);
            }
        } else if (file.endsWith('.js')) {
            mix.js(absolute, directory + "/dist/block.js");
        } else if (file.endsWith('.scss')) {
            mix.sass(absolute, directory + "/dist/block.min.css", {
                sassOptions: {
                    outputStyle: 'compressed',
                }
            });
        }
    });
}

// Call the function on the blocks directory
mixBlocks('./includes/blocks/');

// Add postCss options
mix.options({
    processCssUrls: false,
    postCss: [
        tailwindcss('./tailwind.config.js')
    ],
});
