import Vue from 'vue';
import Vuetify from 'vuetify/lib/framework';

Vue.use(Vuetify);

export default new Vuetify({
    theme: {
        themes: {
            light: {
                primary: '#607d8b',
                secondary: '#9c27b0',
                accent: '#3f51b5',
                error: '#f44336',
                warning: '#ff5722',
                info: '#009688',
                success: '#4caf50'
            }
            
        }
    }
});
