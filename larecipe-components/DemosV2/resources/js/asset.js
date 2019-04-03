// v2 demos
import BasicUsageV2 from './demos/v2/basic-usage';
import AdvancedDemo1V2 from './demos/v2/advanced-demo-1-v2';
import AdvancedDemo2V2 from './demos/v2/advanced-demo-2-v2';

LaRecipe.booting(Vue => {
    Vue.component('basic-usage-v2', BasicUsageV2);
    Vue.component('advanced-demo-1-v2', AdvancedDemo1V2);
    Vue.component('advanced-demo-2-v2', AdvancedDemo2V2);
});