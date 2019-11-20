// v5 demos
import BasicUsageV5 from './demos/v5/basic-usage-v5';
import AdvancedDemo1V5 from './demos/v5/advanced-demo-1-v5';
import AdvancedDemo2V5 from './demos/v5/advanced-demo-2-v5';
import AdvancedNested from './demos/v5/advanced-nested';
import CloseOnClickV5 from './demos/v5/close-on-click-v5';
import CloseOnScrollV5 from './demos/v5/close-on-scroll-v5';

LaRecipe.booting(Vue => {
    Vue.component('basic-usage-v5', BasicUsageV5);
    Vue.component('advanced-demo-1-v5', AdvancedDemo1V5);
    Vue.component('advanced-demo-2-v5', AdvancedDemo2V5);
    Vue.component('advanced-nested', AdvancedNested);
    Vue.component('close-on-click-v5', CloseOnClickV5);
    Vue.component('close-on-scroll-v5', CloseOnScrollV5);
});