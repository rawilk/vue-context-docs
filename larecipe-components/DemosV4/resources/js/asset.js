// v4 demos
import BasicUsageV4 from './demos/v4/basic-usage-v4';
import AdvancedDemo1V4 from './demos/v4/advanced-demo-1-v4';
import AdvancedDemo2V4 from './demos/v4/advanced-demo-2-v4';
import CloseOnClickV4 from './demos/v4/close-on-click-v4';
import CloseOnScrollV4 from './demos/v4/close-on-scroll-v4';

LaRecipe.booting(Vue => {
    Vue.component('basic-usage-v4', BasicUsageV4);
    Vue.component('advanced-demo-1-v4', AdvancedDemo1V4);
    Vue.component('advanced-demo-2-v4', AdvancedDemo2V4);
    Vue.component('close-on-click-v4', CloseOnClickV4);
    Vue.component('close-on-scroll-v4', CloseOnScrollV4);
});