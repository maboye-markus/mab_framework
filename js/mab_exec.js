import * as Common from "./modules/mab_common.js";


Common.mab_animations();
Common.mab_collapse();
Common.mab_loader();
Common.mab_modals();
Common.mab_scroll();

// ====================

import * as Slider from "./modules/mab_slider.js";


// here order is important cause slider's event are put in the DOM after lightbox create a new Element
Slider.mab_lightbox();
Slider.mab_slider();
