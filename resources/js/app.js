/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHashHistory } from 'vue-router';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import HomeComponent from './components/HomeComponent.vue';
import CharactersComponent from './components/CharactersComponent.vue';
import CharacterForm from './components/CharacterForm.vue';
import EntryForm from './components/EntryForm.vue';

app.component('home-component', HomeComponent);
app.component('characters-component', CharactersComponent);
app.component('character-form', CharacterForm);
app.component('entry-form', EntryForm);

const routes = [
    {
        path: '/',
        component: HomeComponent
    },
    {
        path: '/characters',
        component: CharactersComponent
    },
    {
        path: '/characters/:newMode',
        component: CharacterForm,
        props: true
    },
    {
        path: '/characters/:characterid/edit',
        component: CharacterForm,
        props: true
    }
];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});

app.use(router);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
