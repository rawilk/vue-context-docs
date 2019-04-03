// v3 demos
import BasicUsageV3 from './demos/v3/basic-usage';
import AdvancedDemo1V3 from './demos/v3/advanced-demo-1-v3';
import AdvancedDemo2V3 from './demos/v3/advanced-demo-2-v3';
import CloseOnClickV3 from './demos/v3/close-on-click-v3';
import CloseOnScrollV3 from './demos/v3/close-on-scroll-v3';

LaRecipe.booting(Vue => {
    Vue.component('basic-usage-v3', BasicUsageV3);
    Vue.component('advanced-demo-1-v3', AdvancedDemo1V3);
    Vue.component('advanced-demo-2-v3', AdvancedDemo2V3);
    Vue.component('close-on-click-v3', CloseOnClickV3);
    Vue.component('close-on-scroll-v3', CloseOnScrollV3);
});