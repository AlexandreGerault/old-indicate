
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('jquery');

window.Vue = require('vue');

import InfiniteLoading from 'vue-infinite-loading';

Vue.use(InfiniteLoading, {
    props: {
        spinner: 'default',
    },
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('news-timeline', require('./components/News/NewsTimelineComponent.vue').default);
Vue.component('indicate-search-form', require('./components/IndicateResearch/SearchFormComponent.vue').default);
Vue.component('simple-search-form', require('./components/SimpleSearch/SimpleSearch.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
if(document.getElementById('news') !== null) {
    const newsApp = new Vue().$mount('#news');
}

if(document.getElementById('simple-search-form') !== null) {
    const simpleSearchApp = new Vue().$mount('#simple-search-form');
}

if(document.getElementById('indicate-search-form') !== null) {
    const indicateSearchApp = new Vue().$mount('#indicate-search-form');
}

let editor = document.getElementById('editor');
let toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],

    [ 'link', 'image', 'video'],
  
    [{ 'header': 2 }],               // custom button values
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  
    [{ 'header': [2, 3, 4, 5, 6, false] }],
  
    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'align': [] }],
  
    ['clean']                                         // remove formatting button
  ];

/*
    var form = document.querySelector('#write_post_form');

    console.log(form);

    form.onsubmit = function() {
        var content = document.querySelector('input[name=content]');
        content.value = quill.root.innerHTML;
        alert(content.value);
    }
}
*/
