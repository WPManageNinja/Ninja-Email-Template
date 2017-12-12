const mix = require('laravel-mix');
const min = '';

mix.setPublicPath('admin');
mix.setResourceRoot('../');

mix.js('resources/assets/js/admin/admin.js', `js/ninja-email${min}.js`);
// mix.js('resources/assets/public/js/ulist_suggestion_script.js', `js/ulist_suggestion_script${min}.js`);
// mix.sass('resources/assets/admin/css/admin.scss', `css/ulist_admin${min}.css`);
// mix.sass('resources/assets/public/css/ulist_public.scss', `css/ulist_public${min}.css`);