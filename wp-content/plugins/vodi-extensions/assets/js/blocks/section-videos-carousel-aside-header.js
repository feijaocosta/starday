(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

var _ShortcodeAtts = require("../components/ShortcodeAtts");

var _CarouselArgs = require("../components/CarouselArgs");

var _DesignOptions = require("../components/DesignOptions");

const {
  __
} = wp.i18n;
const {
  registerBlockType
} = wp.blocks;
const {
  InspectorControls
} = wp.editor;
const {
  Fragment
} = wp.element;
const {
  ServerSideRender,
  Disabled,
  PanelBody,
  TextControl,
  SelectControl
} = wp.components;
registerBlockType('vodi/section-videos-carousel-aside-header', {
  title: __('Videos Carousel Aside Header Block', 'vodi-extensions'),
  icon: 'video-alt2',
  category: 'vodi-blocks',
  edit: props => {
    const {
      attributes,
      setAttributes
    } = props;
    const {
      section_title,
      section_subtitle,
      action_text,
      action_link,
      header_posisition,
      section_background,
      section_style,
      shortcode_atts,
      carousel_args,
      design_options
    } = attributes;

    const onChangeSectionTitle = newSectionTitle => {
      setAttributes({
        section_title: newSectionTitle
      });
    };

    const onChangeSectionSubtitle = newSectionSubtitle => {
      setAttributes({
        section_subtitle: newSectionSubtitle
      });
    };

    const onChangeActionText = newActionText => {
      setAttributes({
        action_text: newActionText
      });
    };

    const onChangeActionLink = newActionLink => {
      setAttributes({
        action_link: newActionLink
      });
    };

    const onChangeHeaderPosition = newHeaderPosition => {
      setAttributes({
        header_posisition: newHeaderPosition
      });
    };

    const onChangeSectionBackground = newSectionBackground => {
      setAttributes({
        section_background: newSectionBackground
      });
    };

    const onChangeSectionStyle = newSectionStyle => {
      setAttributes({
        section_style: newSectionStyle
      });
    };

    const onChangeShortcodeAtts = newShortcodeAtts => {
      setAttributes({
        shortcode_atts: { ...shortcode_atts,
          ...newShortcodeAtts
        }
      });
    };

    const onChangeCarouselArgs = newCarouselArgs => {
      setAttributes({
        carousel_args: { ...carousel_args,
          ...newCarouselArgs
        }
      });
    };

    const onChangeDesignOptions = newDesignOptions => {
      setAttributes({
        design_options: { ...design_options,
          ...newDesignOptions
        }
      });
    };

    return wp.element.createElement(Fragment, null, wp.element.createElement(InspectorControls, null, wp.element.createElement(TextControl, {
      label: __('Section Title', 'vodi-extensions'),
      value: section_title,
      onChange: onChangeSectionTitle
    }), wp.element.createElement(TextControl, {
      label: __('Section Subtitle', 'vodi-extensions'),
      value: section_subtitle,
      onChange: onChangeSectionSubtitle
    }), wp.element.createElement(TextControl, {
      label: __('Action Text', 'vodi-extensions'),
      value: action_text,
      onChange: onChangeActionText
    }), wp.element.createElement(TextControl, {
      label: __('Action Link', 'vodi-extensions'),
      value: action_link,
      onChange: onChangeActionLink
    }), wp.element.createElement(SelectControl, {
      label: __('Header Position', 'vodi-extensions'),
      value: header_posisition,
      options: [{
        label: __('Left', 'vodi-extensions'),
        value: 'header-left'
      }, {
        label: __('Right', 'vodi-extensions'),
        value: 'header-right'
      }],
      onChange: onChangeHeaderPosition
    }), wp.element.createElement(SelectControl, {
      label: __('Background Color', 'vodi-extensions'),
      value: section_background,
      options: [{
        label: __('Default', 'vodi-extensions'),
        value: ''
      }, {
        label: __('Dark', 'vodi-extensions'),
        value: 'dark'
      }, {
        label: __('More Dark', 'vodi-extensions'),
        value: 'dark more-dark'
      }, {
        label: __('Less Dark', 'vodi-extensions'),
        value: 'dark less-dark'
      }, {
        label: __('Light', 'vodi-extensions'),
        value: 'light'
      }, {
        label: __('More Light', 'vodi-extensions'),
        value: 'light more-light'
      }],
      onChange: onChangeSectionBackground
    }), wp.element.createElement(SelectControl, {
      label: __('Style', 'vodi-extensions'),
      value: section_style,
      options: [{
        label: __('Style 1', 'vodi-extensions'),
        value: ''
      }, {
        label: __('Style 2', 'vodi-extensions'),
        value: 'style-2'
      }],
      onChange: onChangeSectionStyle
    }), wp.element.createElement(PanelBody, {
      title: __('Videos Attributes', 'vodi-extensions'),
      initialOpen: true
    }, wp.element.createElement(_ShortcodeAtts.ShortcodeAtts, {
      postType: "video",
      catTaxonomy: "video_cat",
      tagTaxonomy: "video_tag",
      hideFields: ['columns', 'top_rated'],
      attributes: { ...shortcode_atts
      },
      updateShortcodeAtts: onChangeShortcodeAtts
    })), wp.element.createElement(PanelBody, {
      title: __('Carousel Args', 'vodi-extensions'),
      initialOpen: true
    }, wp.element.createElement(_CarouselArgs.CarouselArgs, {
      attributes: { ...carousel_args
      },
      updateCarouselArgs: onChangeCarouselArgs
    })), wp.element.createElement(PanelBody, {
      title: __('Design Options', 'vodi-extensions'),
      initialOpen: false
    }, wp.element.createElement(_DesignOptions.DesignOptions, {
      attributes: { ...design_options
      },
      updateDesignOptions: onChangeDesignOptions
    }))), wp.element.createElement(Disabled, null, wp.element.createElement(ServerSideRender, {
      block: "vodi/section-videos-carousel-aside-header",
      attributes: attributes
    })));
  },

  save() {
    // Rendering in PHP
    return null;
  }

});

},{"../components/CarouselArgs":2,"../components/DesignOptions":3,"../components/ShortcodeAtts":7}],2:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.CarouselArgs = void 0;
const {
  __
} = wp.i18n;
const {
  Component
} = wp.element;
const {
  RangeControl,
  CheckboxControl
} = wp.components;
/**
 * CarouselArgs Component
 */

class CarouselArgs extends Component {
  /**
   * Constructor for CarouselArgs Component.
   * Sets up state, and creates bindings for functions.
   * @param object props - current component properties.
   */
  constructor(props) {
    super(...arguments);
    this.props = props;
    this.onChangeSlidesToShow = this.onChangeSlidesToShow.bind(this);
    this.onChangeSlidesToScroll = this.onChangeSlidesToScroll.bind(this);
    this.onChangeDots = this.onChangeDots.bind(this);
    this.onChangeArrows = this.onChangeArrows.bind(this);
    this.onChangeAutoplay = this.onChangeAutoplay.bind(this);
    this.onChangeInfinite = this.onChangeInfinite.bind(this);
  }

  onChangeSlidesToShow(newSlidesToShow) {
    this.props.updateCarouselArgs({
      slidesToShow: newSlidesToShow
    });
  }

  onChangeSlidesToScroll(newSlidesToScroll) {
    this.props.updateCarouselArgs({
      slidesToScroll: newSlidesToScroll
    });
  }

  onChangeDots(newDots) {
    this.props.updateCarouselArgs({
      dots: newDots
    });
  }

  onChangeArrows(newArrows) {
    this.props.updateCarouselArgs({
      arrows: newArrows
    });
  }

  onChangeAutoplay(newAutoplay) {
    this.props.updateCarouselArgs({
      autoplay: newAutoplay
    });
  }

  onChangeInfinite(newInfinite) {
    this.props.updateCarouselArgs({
      infinite: newInfinite
    });
  }
  /**
   * Renders the CarouselArgs component.
   */


  render() {
    const {
      attributes
    } = this.props;
    const {
      slidesToShow,
      slidesToScroll,
      dots,
      arrows,
      autoplay,
      infinite
    } = attributes;
    return wp.element.createElement("div", null, wp.element.createElement(RangeControl, {
      label: __('Slide To Show', 'vodi-extensions'),
      value: slidesToShow,
      onChange: this.onChangeSlidesToShow,
      min: 1,
      max: 8
    }), wp.element.createElement(RangeControl, {
      label: __('Slides To Scroll', 'vodi-extensions'),
      value: slidesToScroll,
      onChange: this.onChangeSlidesToScroll,
      min: 1,
      max: 8
    }), wp.element.createElement(CheckboxControl, {
      label: __('Dots', 'vodi-extensions'),
      help: __('Check to show carousel dots.', 'vodi-extensions'),
      checked: dots,
      onChange: this.onChangeDots
    }), wp.element.createElement(CheckboxControl, {
      label: __('Arrows', 'vodi-extensions'),
      help: __('Check to show carousel arrows.', 'vodi-extensions'),
      checked: arrows,
      onChange: this.onChangeArrows
    }), wp.element.createElement(CheckboxControl, {
      label: __('Autoplay', 'vodi-extensions'),
      help: __('Check to autoplay carousel.', 'vodi-extensions'),
      checked: autoplay,
      onChange: this.onChangeAutoplay
    }), wp.element.createElement(CheckboxControl, {
      label: __('Infinite Scroll', 'vodi-extensions'),
      help: __('Check to infinite scroll carousel.', 'vodi-extensions'),
      checked: infinite,
      onChange: this.onChangeInfinite
    }));
  }

}

exports.CarouselArgs = CarouselArgs;

},{}],3:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.DesignOptions = void 0;
const {
  __
} = wp.i18n;
const {
  Component
} = wp.element;
const {
  RangeControl
} = wp.components;
/**
 * DesignOptions Component
 */

class DesignOptions extends Component {
  /**
   * Constructor for DesignOptions Component.
   * Sets up state, and creates bindings for functions.
   * @param object props - current component properties.
   */
  constructor(props) {
    super(...arguments);
    this.props = props;
    this.onChangePaddingTop = this.onChangePaddingTop.bind(this);
    this.onChangePaddingBottom = this.onChangePaddingBottom.bind(this);
    this.onChangePaddingLeft = this.onChangePaddingLeft.bind(this);
    this.onChangePaddingRight = this.onChangePaddingRight.bind(this);
    this.onChangeMarginTop = this.onChangeMarginTop.bind(this);
    this.onChangeMarginBottom = this.onChangeMarginBottom.bind(this);
  }

  onChangePaddingTop(newonChangePaddingTop) {
    this.props.updateDesignOptions({
      padding_top: newonChangePaddingTop
    });
  }

  onChangePaddingBottom(newonChangePaddingBottom) {
    this.props.updateDesignOptions({
      padding_bottom: newonChangePaddingBottom
    });
  }

  onChangePaddingLeft(newonChangePaddingLeft) {
    this.props.updateDesignOptions({
      padding_left: newonChangePaddingLeft
    });
  }

  onChangePaddingRight(newonChangePaddingRight) {
    this.props.updateDesignOptions({
      padding_right: newonChangePaddingRight
    });
  }

  onChangeMarginTop(newonChangeMarginTop) {
    this.props.updateDesignOptions({
      margin_top: newonChangeMarginTop
    });
  }

  onChangeMarginBottom(newonChangeMarginBottom) {
    this.props.updateDesignOptions({
      margin_bottom: newonChangeMarginBottom
    });
  }
  /**
   * Renders the DesignOptions component.
   */


  render() {
    const {
      attributes
    } = this.props;
    const {
      padding_top,
      padding_bottom,
      padding_left,
      padding_right,
      margin_top,
      margin_bottom
    } = attributes;
    return wp.element.createElement("div", null, wp.element.createElement(RangeControl, {
      label: __('Padding Top (px)', 'vodi-extensions'),
      value: padding_top,
      onChange: this.onChangePaddingTop,
      min: 0,
      max: 100
    }), wp.element.createElement(RangeControl, {
      label: __('Padding Bottom (px)', 'vodi-extensions'),
      value: padding_bottom,
      onChange: this.onChangePaddingBottom,
      min: 0,
      max: 100
    }), wp.element.createElement(RangeControl, {
      label: __('Padding Left (px)', 'vodi-extensions'),
      value: padding_left,
      onChange: this.onChangePaddingLeft,
      min: 0,
      max: 100
    }), wp.element.createElement(RangeControl, {
      label: __('Padding Right (px)', 'vodi-extensions'),
      value: padding_right,
      onChange: this.onChangePaddingRight,
      min: 0,
      max: 100
    }), wp.element.createElement(RangeControl, {
      label: __('Margin Top (px)', 'vodi-extensions'),
      value: margin_top,
      onChange: this.onChangeMarginTop,
      min: -100,
      max: 100
    }), wp.element.createElement(RangeControl, {
      label: __('Margin Bottom (px)', 'vodi-extensions'),
      value: margin_bottom,
      onChange: this.onChangeMarginBottom,
      min: -100,
      max: 100
    }));
  }

}

exports.DesignOptions = DesignOptions;

},{}],4:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.Item = void 0;

/**
 * Item Component.
 *
 * @param {string} itemTitle - Current item title.
 * @param {function} clickHandler - this is the handling function for the add/remove function
 * @param {Integer} itemId - Current item ID
 * @param icon
 * @returns {*} Item HTML.
 */
const Item = _ref => {
  let {
    title: {
      rendered: itemTitle
    } = {},
    name,
    clickHandler,
    id: itemId,
    icon
  } = _ref;
  return wp.element.createElement("article", {
    className: "item"
  }, wp.element.createElement("div", {
    className: "item-body"
  }, wp.element.createElement("h3", {
    className: "item-title",
    style: {
      marginTop: '0'
    }
  }, itemTitle, name)), wp.element.createElement("button", {
    onClick: () => clickHandler(itemId)
  }, icon));
};

exports.Item = Item;

},{}],5:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.ItemList = void 0;

var _Item = require("./Item");

function _extends() { _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }

const {
  __
} = wp.i18n;
/**
 * ItemList Component
 * @param object props - Component props.
 * @returns {*}
 * @constructor
 */

const ItemList = props => {
  const {
    filtered = false,
    loading = false,
    items = [],
    action = () => {},
    icon = null
  } = props;

  if (loading) {
    return wp.element.createElement("p", {
      className: "loading-items"
    }, __('Loading ...', 'vodi-extensions'));
  }

  if (filtered && items.length < 1) {
    return wp.element.createElement("div", {
      className: "item-list"
    }, wp.element.createElement("p", null, __('Your query yielded no results, please try again.', 'vodi-extensions')));
  }

  if (!items || items.length < 1) {
    return wp.element.createElement("p", {
      className: "no-items"
    }, __('Not found.', 'vodi-extensions'));
  }

  return wp.element.createElement("div", {
    className: "item-list"
  }, items.map(item => wp.element.createElement(_Item.Item, _extends({
    key: item.id
  }, item, {
    clickHandler: action,
    icon: icon
  }))));
};

exports.ItemList = ItemList;

},{"./Item":4}],6:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.PostSelector = void 0;

var _ItemList = require("./ItemList");

var api = _interopRequireWildcard(require("../utils/api"));

var _usefulFuncs = require("../utils/useful-funcs");

function _getRequireWildcardCache(nodeInterop) { if (typeof WeakMap !== "function") return null; var cacheBabelInterop = new WeakMap(); var cacheNodeInterop = new WeakMap(); return (_getRequireWildcardCache = function (nodeInterop) { return nodeInterop ? cacheNodeInterop : cacheBabelInterop; })(nodeInterop); }

function _interopRequireWildcard(obj, nodeInterop) { if (!nodeInterop && obj && obj.__esModule) { return obj; } if (obj === null || typeof obj !== "object" && typeof obj !== "function") { return { default: obj }; } var cache = _getRequireWildcardCache(nodeInterop); if (cache && cache.has(obj)) { return cache.get(obj); } var newObj = {}; var hasPropertyDescriptor = Object.defineProperty && Object.getOwnPropertyDescriptor; for (var key in obj) { if (key !== "default" && Object.prototype.hasOwnProperty.call(obj, key)) { var desc = hasPropertyDescriptor ? Object.getOwnPropertyDescriptor(obj, key) : null; if (desc && (desc.get || desc.set)) { Object.defineProperty(newObj, key, desc); } else { newObj[key] = obj[key]; } } } newObj.default = obj; if (cache) { cache.set(obj, newObj); } return newObj; }

const {
  __
} = wp.i18n;
const {
  Icon
} = wp.components;
const {
  Component
} = wp.element;
/**
 * PostSelector Component
 */

class PostSelector extends Component {
  /**
   * Constructor for PostSelector Component.
   * Sets up state, and creates bindings for functions.
   * @param object props - current component properties.
   */
  constructor(props) {
    super(...arguments);
    this.props = props;
    this.state = {
      posts: [],
      loading: false,
      type: props.postType || 'post',
      types: [],
      filter: '',
      filterLoading: false,
      filterPosts: [],
      initialLoading: false,
      selectedPosts: []
    };
    this.addPost = this.addPost.bind(this);
    this.removePost = this.removePost.bind(this);
    this.handleInputFilterChange = this.handleInputFilterChange.bind(this);
    this.doPostFilter = (0, _usefulFuncs.debounce)(this.doPostFilter.bind(this), 300);
    this.getSelectedPostIds = this.getSelectedPostIds.bind(this);
    this.getSelectedPosts = this.getSelectedPosts.bind(this);
  }
  /**
   * When the component mounts it calls this function.
   * Fetches posts types, selected posts then makes first call for posts
   */


  componentDidMount() {
    this.setState({
      initialLoading: true
    });
    api.getPostTypes().then(response => {
      this.setState({
        types: response
      }, () => {
        this.retrieveSelectedPosts().then(selectedPosts => {
          if (selectedPosts) {
            this.setState({
              initialLoading: false,
              selectedPosts: selectedPosts
            });
          } else {
            this.setState({
              initialLoading: false
            });
          }
        });
      });
    });
  }
  /**
   * GetPosts wrapper, builds the request argument based state and parameters passed/
   * @param {object} args - desired arguments (can be empty).
   * @returns {Promise<T>}
   */


  getPosts() {
    let args = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
    const postIds = this.getSelectedPostIds();
    const defaultArgs = {
      per_page: 10,
      type: this.state.type,
      search: this.state.filter
    };
    const requestArguments = { ...defaultArgs,
      ...args
    };
    requestArguments.restBase = this.state.types[this.state.type].rest_base;
    return api.getPosts(requestArguments).then(response => {
      if (requestArguments.search) {
        this.setState({
          filterPosts: response.filter(_ref => {
            let {
              id
            } = _ref;
            return postIds.indexOf(id) === -1;
          })
        });
        return response;
      }

      this.setState({
        posts: (0, _usefulFuncs.uniqueById)([...this.state.posts, ...response])
      }); // return response to continue the chain

      return response;
    });
  }
  /**
   * Gets the selected posts by id from the `posts` state object and sorts them by their position in the selected array.
   * @returns Array of objects.
   */


  getSelectedPostIds() {
    const {
      selectedPostIds
    } = this.props;

    if (selectedPostIds) {
      const postIds = Array.isArray(selectedPostIds) ? selectedPostIds : selectedPostIds.split(',');
      return postIds;
    }

    return [];
  }
  /**
   * Gets the selected posts by id from the `posts` state object and sorts them by their position in the selected array.
   * @returns Array of objects.
   */


  getSelectedPosts(postIds) {
    // const filterPostsList = this.state.filtering && !this.state.filterLoading ? this.state.filterPosts : [];
    const postList = (0, _usefulFuncs.uniqueById)([...this.state.filterPosts, ...this.state.posts]);
    const selectedPosts = postList.filter(_ref2 => {
      let {
        id
      } = _ref2;
      return postIds.indexOf(id) !== -1;
    }).sort((a, b) => {
      const aIndex = postIds.indexOf(a.id);
      const bIndex = postIds.indexOf(b.id);

      if (aIndex > bIndex) {
        return 1;
      }

      if (aIndex < bIndex) {
        return -1;
      }

      return 0;
    });
    this.setState({
      selectedPosts: selectedPosts
    });
  }
  /**
   * Makes the necessary api calls to fetch the selected posts and returns a promise.
   * @returns {*}
   */


  retrieveSelectedPosts() {
    const {
      postType,
      selectedPostIds
    } = this.props;
    const {
      types
    } = this.state;
    const postIds = this.getSelectedPostIds().join(',');

    if (!postIds) {
      // return a fake promise that auto resolves.
      return new Promise(resolve => resolve());
    }

    let post_args = {
      include: postIds,
      per_page: 100,
      postType
    };

    if (this.props.postStatus) {
      post_args.status = this.props.postStatus;
    }

    return this.getPosts({ ...post_args
    });
  }
  /**
   * Adds desired post id to the selectedPostIds List
   * @param {Integer} post_id
   */


  addPost(post_id) {
    if (this.state.filter) {
      const post = this.state.filterPosts.filter(p => p.id === post_id);
      const posts = (0, _usefulFuncs.uniqueById)([...this.state.posts, ...post]);
      this.setState({
        posts
      });
    }

    if (this.props.selectSingle) {
      const selectedPostIds = [post_id];
      this.props.updateSelectedPostIds(selectedPostIds);
      this.getSelectedPosts(selectedPostIds);
    } else {
      const postIds = this.getSelectedPostIds();
      const selectedPostIds = [...postIds, post_id];
      this.props.updateSelectedPostIds(selectedPostIds);
      this.getSelectedPosts(selectedPostIds);
    }
  }
  /**
   * Removes desired post id to the selectedPostIds List
   * @param {Integer} post_id
   */


  removePost(post_id) {
    const postIds = this.getSelectedPostIds();
    const selectedPostIds = [...postIds].filter(id => id !== post_id);
    this.props.updateSelectedPostIds(selectedPostIds);
    this.getSelectedPosts(selectedPostIds);
  }
  /**
   * Handles the search box input value
   * @param string type - comes from the event object target.
   */


  handleInputFilterChange() {
    let {
      target: {
        value: filter = ''
      } = {}
    } = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
    this.setState({
      filter
    }, () => {
      if (!filter) {
        // remove filtered posts
        return this.setState({
          filteredPosts: [],
          filtering: false
        });
      }

      this.doPostFilter();
    });
  }
  /**
   * Actual api call for searching for query, this function is debounced in constructor.
   */


  doPostFilter() {
    const {
      filter = ''
    } = this.state;

    if (!filter) {
      return;
    }

    this.setState({
      filtering: true,
      filterLoading: true
    });
    let post_args = {};

    if (this.props.postStatus) {
      post_args.status = this.props.postStatus;
    }

    this.getPosts({ ...post_args
    }).then(() => {
      this.setState({
        filterLoading: false
      });
    });
  }
  /**
   * Renders the PostSelector component.
   */


  render() {
    const postList = this.state.filtering && !this.state.filterLoading ? this.state.filterPosts : [];
    const addIcon = wp.element.createElement(Icon, {
      icon: "plus"
    });
    const removeIcon = wp.element.createElement(Icon, {
      icon: "minus"
    });
    const searchinputuniqueId = 'searchinput-' + Math.random().toString(36).substr(2, 16);
    return wp.element.createElement("div", {
      className: "components-base-control components-post-selector"
    }, wp.element.createElement("div", {
      className: "components-base-control__field--selected"
    }, wp.element.createElement("h2", null, __('Search Post', 'vodi-extensions')), wp.element.createElement(_ItemList.ItemList, {
      items: [...this.state.selectedPosts],
      loading: this.state.initialLoading,
      action: this.removePost,
      icon: removeIcon
    })), wp.element.createElement("div", {
      className: "components-base-control__field"
    }, wp.element.createElement("label", {
      htmlFor: searchinputuniqueId,
      className: "components-base-control__label"
    }, wp.element.createElement(Icon, {
      icon: "search"
    })), wp.element.createElement("input", {
      className: "components-text-control__input",
      id: searchinputuniqueId,
      type: "search",
      placeholder: __('Please enter your search query...', 'vodi-extensions'),
      value: this.state.filter,
      onChange: this.handleInputFilterChange
    }), wp.element.createElement(_ItemList.ItemList, {
      items: postList,
      loading: this.state.initialLoading || this.state.loading || this.state.filterLoading,
      filtered: this.state.filtering,
      action: this.addPost,
      icon: addIcon
    })));
  }

}

exports.PostSelector = PostSelector;

},{"../utils/api":9,"../utils/useful-funcs":10,"./ItemList":5}],7:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.ShortcodeAtts = void 0;

var _PostSelector = require("./PostSelector");

var _TermSelector = require("./TermSelector");

const {
  __
} = wp.i18n;
const {
  Component
} = wp.element;
const {
  RangeControl,
  SelectControl,
  CheckboxControl
} = wp.components;
const {
  applyFilters
} = wp.hooks;
/**
 * ShortcodeAtts Component
 */

class ShortcodeAtts extends Component {
  /**
   * Constructor for ShortcodeAtts Component.
   * Sets up state, and creates bindings for functions.
   * @param object props - current component properties.
   */
  constructor(props) {
    super(...arguments);
    this.props = props;
    this.onChangeLimit = this.onChangeLimit.bind(this);
    this.onChangeColumns = this.onChangeColumns.bind(this);
    this.onChangeOrderby = this.onChangeOrderby.bind(this);
    this.onChangeOrder = this.onChangeOrder.bind(this);
    this.onChangeIds = this.onChangeIds.bind(this);
    this.onChangeCategory = this.onChangeCategory.bind(this);
    this.onChangeGenre = this.onChangeGenre.bind(this);
    this.onChangeTag = this.onChangeTag.bind(this);
    this.onChangeFeatured = this.onChangeFeatured.bind(this);
    this.onChangeTopRated = this.onChangeTopRated.bind(this);
  }

  onChangeLimit(newLimit) {
    this.props.updateShortcodeAtts({
      limit: newLimit
    });
  }

  onChangeColumns(newColumns) {
    this.props.updateShortcodeAtts({
      columns: newColumns
    });
  }

  onChangeOrderby(newOrderby) {
    this.props.updateShortcodeAtts({
      orderby: newOrderby
    });
  }

  onChangeOrder(newOrder) {
    this.props.updateShortcodeAtts({
      order: newOrder
    });
  }

  onChangeIds(newIds) {
    this.props.updateShortcodeAtts({
      ids: newIds.join(',')
    });
  }

  onChangeCategory(newCategory) {
    this.props.updateShortcodeAtts({
      category: newCategory.join(',')
    });
  }

  onChangeGenre(newGenre) {
    this.props.updateShortcodeAtts({
      genre: newGenre.join(',')
    });
  }

  onChangeTag(newTag) {
    this.props.updateShortcodeAtts({
      tag: newTag.join(',')
    });
  }

  onChangeFeatured(newFeatured) {
    this.props.updateShortcodeAtts({
      featured: newFeatured
    });
  }

  onChangeTopRated(newTopRated) {
    this.props.updateShortcodeAtts({
      top_rated: newTopRated
    });
  }
  /**
   * Renders the ShortcodeAtts component.
   */


  render() {
    const {
      attributes,
      postType,
      postStatus,
      catTaxonomy,
      tagTaxonomy,
      minLimit = 1,
      maxLimit = 20,
      minColumns = 1,
      maxColumns = 6,
      hideFields
    } = this.props;
    const {
      limit,
      columns,
      orderby,
      order,
      ids,
      category,
      genre,
      tag,
      featured,
      top_rated
    } = attributes;
    return wp.element.createElement("div", null, !(hideFields && hideFields.includes('limit')) ? wp.element.createElement(RangeControl, {
      label: __('Limit', 'vodi-extensions'),
      value: limit,
      onChange: this.onChangeLimit,
      min: applyFilters('vodi.component.shortcodeAtts.limit.min', minLimit),
      max: applyFilters('vodi.component.shortcodeAtts.limit.max', maxLimit)
    }) : '', !(hideFields && hideFields.includes('columns')) ? wp.element.createElement(RangeControl, {
      label: __('Columns', 'vodi-extensions'),
      value: columns,
      onChange: this.onChangeColumns,
      min: applyFilters('vodi.component.shortcodeAtts.columns.min', minColumns),
      max: applyFilters('vodi.component.shortcodeAtts.columns.max', maxColumns)
    }) : '', !(hideFields && hideFields.includes('orderby')) ? wp.element.createElement(SelectControl, {
      label: __('Orderby', 'vodi-extensions'),
      value: orderby,
      options: applyFilters('vodi.component.shortcodeAtts.orderby.options', [{
        label: __('Title', 'vodi-extensions'),
        value: 'title'
      }, {
        label: __('Date', 'vodi-extensions'),
        value: postType === 'movie' ? 'release_date' : 'date'
      }, {
        label: __('ID', 'vodi-extensions'),
        value: 'id'
      }, {
        label: __('Random', 'vodi-extensions'),
        value: 'rand'
      }], this.props),
      onChange: this.onChangeOrderby
    }) : '', !(hideFields && hideFields.includes('order')) ? wp.element.createElement(SelectControl, {
      label: __('Order', 'vodi-extensions'),
      value: order,
      options: applyFilters('vodi.component.shortcodeAtts.order.options', [{
        label: __('ASC', 'vodi-extensions'),
        value: 'ASC'
      }, {
        label: __('DESC', 'vodi-extensions'),
        value: 'DESC'
      }], this.props),
      onChange: this.onChangeOrder
    }) : '', !(hideFields && hideFields.includes('ids')) ? wp.element.createElement(_PostSelector.PostSelector, {
      postType: postType,
      postStatus: postStatus,
      selectedPostIds: ids ? ids.split(',').map(Number) : [],
      updateSelectedPostIds: this.onChangeIds
    }) : '', postType === 'video' && catTaxonomy && !(hideFields && hideFields.includes('category')) ? wp.element.createElement(_TermSelector.TermSelector, {
      postType: postType,
      taxonomy: catTaxonomy,
      title: __('Search Category', 'vodi-extensions'),
      selectedTermIds: category ? category.split(',').map(Number) : [],
      updateSelectedTermIds: this.onChangeCategory
    }) : catTaxonomy && !(hideFields && hideFields.includes('genre')) ? wp.element.createElement(_TermSelector.TermSelector, {
      postType: postType,
      taxonomy: catTaxonomy,
      title: __('Search Genre', 'vodi-extensions'),
      selectedTermIds: genre ? genre.split(',').map(Number) : [],
      updateSelectedTermIds: this.onChangeGenre
    }) : '', !(hideFields && hideFields.includes('tag')) ? wp.element.createElement(_TermSelector.TermSelector, {
      postType: postType,
      taxonomy: tagTaxonomy,
      title: __('Search Tag', 'vodi-extensions'),
      selectedTermIds: tag ? tag.split(',').map(Number) : [],
      updateSelectedTermIds: this.onChangeTag
    }) : '', !(hideFields && hideFields.includes('featured')) ? wp.element.createElement(CheckboxControl, {
      label: __('Featured', 'vodi-extensions'),
      help: __('Check to select featured posts.', 'vodi-extensions'),
      checked: featured,
      onChange: this.onChangeFeatured
    }) : '', !(hideFields && hideFields.includes('top_rated')) ? wp.element.createElement(CheckboxControl, {
      label: __('Top Rated', 'vodi-extensions'),
      help: __('Check to select top rated posts.', 'vodi-extensions'),
      checked: top_rated,
      onChange: this.onChangeTopRated
    }) : '');
  }

}

exports.ShortcodeAtts = ShortcodeAtts;

},{"./PostSelector":6,"./TermSelector":8}],8:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.TermSelector = void 0;

var _ItemList = require("./ItemList");

var api = _interopRequireWildcard(require("../utils/api"));

var _usefulFuncs = require("../utils/useful-funcs");

function _getRequireWildcardCache(nodeInterop) { if (typeof WeakMap !== "function") return null; var cacheBabelInterop = new WeakMap(); var cacheNodeInterop = new WeakMap(); return (_getRequireWildcardCache = function (nodeInterop) { return nodeInterop ? cacheNodeInterop : cacheBabelInterop; })(nodeInterop); }

function _interopRequireWildcard(obj, nodeInterop) { if (!nodeInterop && obj && obj.__esModule) { return obj; } if (obj === null || typeof obj !== "object" && typeof obj !== "function") { return { default: obj }; } var cache = _getRequireWildcardCache(nodeInterop); if (cache && cache.has(obj)) { return cache.get(obj); } var newObj = {}; var hasPropertyDescriptor = Object.defineProperty && Object.getOwnPropertyDescriptor; for (var key in obj) { if (key !== "default" && Object.prototype.hasOwnProperty.call(obj, key)) { var desc = hasPropertyDescriptor ? Object.getOwnPropertyDescriptor(obj, key) : null; if (desc && (desc.get || desc.set)) { Object.defineProperty(newObj, key, desc); } else { newObj[key] = obj[key]; } } } newObj.default = obj; if (cache) { cache.set(obj, newObj); } return newObj; }

const {
  __
} = wp.i18n;
const {
  Icon
} = wp.components;
const {
  Component
} = wp.element;
/**
 * TermSelector Component
 */

class TermSelector extends Component {
  /**
   * Constructor for TermSelector Component.
   * Sets up state, and creates bindings for functions.
   * @param object props - current component properties.
   */
  constructor(props) {
    super(...arguments);
    this.props = props;
    this.state = {
      terms: [],
      loading: false,
      type: props.postType || 'post',
      taxonomy: props.taxonomy || 'category',
      taxonomies: [],
      filter: '',
      filterLoading: false,
      filterTerms: [],
      initialLoading: false
    };
    this.addTerm = this.addTerm.bind(this);
    this.removeTerm = this.removeTerm.bind(this);
    this.handleInputFilterChange = this.handleInputFilterChange.bind(this);
    this.doTermFilter = (0, _usefulFuncs.debounce)(this.doTermFilter.bind(this), 300);
  }
  /**
   * When the component mounts it calls this function.
   * Fetches terms taxonomies, selected terms then makes first call for terms
   */


  componentDidMount() {
    this.setState({
      initialLoading: true
    });
    api.getTaxonomies({
      type: this.state.type
    }).then(response => {
      this.setState({
        taxonomies: response
      }, () => {
        this.retrieveSelectedTerms().then(() => {
          this.setState({
            initialLoading: false
          });
        });
      });
    });
  }
  /**
   * GetTerms wrapper, builds the request argument based state and parameters passed/
   * @param {object} args - desired arguments (can be empty).
   * @returns {Promise<T>}
   */


  getTerms() {
    let args = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
    const {
      selectedTermIds
    } = this.props;
    const defaultArgs = {
      per_page: 10,
      type: this.state.type,
      taxonomy: this.state.taxonomy,
      search: this.state.filter
    };
    const requestArguments = { ...defaultArgs,
      ...args
    };
    requestArguments.restBase = this.state.taxonomies[this.state.taxonomy].rest_base;
    return api.getTerms(requestArguments).then(response => {
      if (requestArguments.search) {
        this.setState({
          filterTerms: response.filter(_ref => {
            let {
              id
            } = _ref;
            return selectedTermIds.indexOf(id) === -1;
          })
        });
        return response;
      }

      this.setState({
        terms: (0, _usefulFuncs.uniqueById)([...this.state.terms, ...response])
      }); // return response to continue the chain

      return response;
    });
  }
  /**
   * Gets the selected terms by id from the `terms` state object and sorts them by their position in the selected array.
   * @returns Array of objects.
   */


  getSelectedTerms() {
    const {
      selectedTermIds
    } = this.props;
    return this.state.terms.filter(_ref2 => {
      let {
        id
      } = _ref2;
      return selectedTermIds.indexOf(id) !== -1;
    }).sort((a, b) => {
      const aIndex = this.props.selectedTermIds.indexOf(a.id);
      const bIndex = this.props.selectedTermIds.indexOf(b.id);

      if (aIndex > bIndex) {
        return 1;
      }

      if (aIndex < bIndex) {
        return -1;
      }

      return 0;
    });
  }
  /**
   * Makes the necessary api calls to fetch the selected terms and returns a promise.
   * @returns {*}
   */


  retrieveSelectedTerms() {
    const {
      termType,
      selectedTermIds
    } = this.props;
    const {
      taxonomies
    } = this.state;

    if (selectedTermIds && !selectedTermIds.length > 0) {
      // return a fake promise that auto resolves.
      return new Promise(resolve => resolve());
    }

    return this.getTerms({
      include: this.props.selectedTermIds.join(','),
      per_page: 100,
      termType
    });
  }
  /**
   * Adds desired term id to the selectedTermIds List
   * @param {Integer} term_id
   */


  addTerm(term_id) {
    if (this.state.filter) {
      const term = this.state.filterTerms.filter(p => p.id === term_id);
      const terms = (0, _usefulFuncs.uniqueById)([...this.state.terms, ...term]);
      this.setState({
        terms
      });
    }

    this.props.updateSelectedTermIds([...this.props.selectedTermIds, term_id]);
  }
  /**
   * Removes desired term id to the selectedTermIds List
   * @param {Integer} term_id
   */


  removeTerm(term_id) {
    this.props.updateSelectedTermIds([...this.props.selectedTermIds].filter(id => id !== term_id));
  }
  /**
   * Handles the search box input value
   * @param string type - comes from the event object target.
   */


  handleInputFilterChange() {
    let {
      target: {
        value: filter = ''
      } = {}
    } = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
    this.setState({
      filter
    }, () => {
      if (!filter) {
        // remove filtered terms
        return this.setState({
          filteredTerms: [],
          filtering: false
        });
      }

      this.doTermFilter();
    });
  }
  /**
   * Actual api call for searching for query, this function is debounced in constructor.
   */


  doTermFilter() {
    const {
      filter = ''
    } = this.state;

    if (!filter) {
      return;
    }

    this.setState({
      filtering: true,
      filterLoading: true
    });
    this.getTerms().then(() => {
      this.setState({
        filterLoading: false
      });
    });
  }
  /**
   * Renders the TermSelector component.
   */


  render() {
    const {
      title = __('Search Term', 'vodi')
    } = this.props;
    const isFiltered = this.state.filtering;
    const termList = isFiltered && !this.state.filterLoading ? this.state.filterTerms : [];
    const SelectedTermList = this.getSelectedTerms();
    const addIcon = wp.element.createElement(Icon, {
      icon: "plus"
    });
    const removeIcon = wp.element.createElement(Icon, {
      icon: "minus"
    });
    const searchinputuniqueId = 'searchinput-' + Math.random().toString(36).substr(2, 16);
    return wp.element.createElement("div", {
      className: "components-base-control components-term-selector"
    }, wp.element.createElement("div", {
      className: "components-base-control__field--selected"
    }, wp.element.createElement("h2", null, title), wp.element.createElement(_ItemList.ItemList, {
      items: SelectedTermList,
      loading: this.state.initialLoading,
      action: this.removeTerm,
      icon: removeIcon
    })), wp.element.createElement("div", {
      className: "components-base-control__field"
    }, wp.element.createElement("label", {
      htmlFor: searchinputuniqueId,
      className: "components-base-control__label"
    }, wp.element.createElement(Icon, {
      icon: "search"
    })), wp.element.createElement("input", {
      className: "components-text-control__input",
      id: searchinputuniqueId,
      type: "search",
      placeholder: __('Please enter your search query...', 'vodi-extensions'),
      value: this.state.filter,
      onChange: this.handleInputFilterChange
    }), wp.element.createElement(_ItemList.ItemList, {
      items: termList,
      loading: this.state.initialLoading || this.state.loading || this.state.filterLoading,
      filtered: isFiltered,
      action: this.addTerm,
      icon: addIcon
    })));
  }

}

exports.TermSelector = TermSelector;

},{"../utils/api":9,"../utils/useful-funcs":10,"./ItemList":5}],9:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.getTerms = exports.getTaxonomies = exports.getPosts = exports.getPostTypes = void 0;
const {
  apiFetch
} = wp;
/**
 * Makes a get request to the PostTypes endpoint.
 *
 * @returns {Promise<any>}
 */

const getPostTypes = () => {
  return apiFetch({
    path: '/wp/v2/types'
  });
};
/**
 * Makes a get request to the desired post type and builds the query string based on an object.
 *
 * @param {string|boolean} restBase - rest base for the query.
 * @param {object} args
 * @returns {Promise<any>}
 */


exports.getPostTypes = getPostTypes;

const getPosts = _ref => {
  let {
    restBase = false,
    ...args
  } = _ref;
  const queryString = Object.keys(args).map(arg => `${arg}=${args[arg]}`).join('&');
  let path = `/wp/v2/${restBase}?${queryString}&_embed`;
  return apiFetch({
    path: path
  });
};
/**
 * Makes a get request to the PostType Taxonomies endpoint.
 *
 * @returns {Promise<any>}
 */


exports.getPosts = getPosts;

const getTaxonomies = _ref2 => {
  let { ...args
  } = _ref2;
  const queryString = Object.keys(args).map(arg => `${arg}=${args[arg]}`).join('&');
  let path = `/wp/v2/taxonomies?${queryString}&_embed`;
  return apiFetch({
    path: path
  });
};
/**
 * Makes a get request to the desired post type and builds the query string based on an object.
 *
 * @param {string|boolean} restBase - rest base for the query.
 * @param {object} args
 * @returns {Promise<any>}
 */


exports.getTaxonomies = getTaxonomies;

const getTerms = _ref3 => {
  let {
    restBase = false,
    ...args
  } = _ref3;
  const queryString = Object.keys(args).map(arg => `${arg}=${args[arg]}`).join('&');
  let path = `/wp/v2/${restBase}?${queryString}&_embed`;
  return apiFetch({
    path: path
  });
};

exports.getTerms = getTerms;

},{}],10:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.uniqueById = exports.uniqueBy = exports.debounce = void 0;

/**
 * Returns a unique array of objects based on a desired key.
 * @param {array} arr - array of objects.
 * @param {string|int} key - key to filter objects by
 */
const uniqueBy = (arr, key) => {
  let keys = [];
  return arr.filter(item => {
    if (keys.indexOf(item[key]) !== -1) {
      return false;
    }

    return keys.push(item[key]);
  });
};
/**
 * Returns a unique array of objects based on the id property.
 * @param {array} arr - array of objects to filter.
 * @returns {*}
 */


exports.uniqueBy = uniqueBy;

const uniqueById = arr => uniqueBy(arr, 'id');
/**
 * Debounce a function by limiting how often it can run.
 * @param {function} func - callback function
 * @param {Integer} wait - Time in milliseconds how long it should wait.
 * @returns {Function}
 */


exports.uniqueById = uniqueById;

const debounce = (func, wait) => {
  let timeout = null;
  return function () {
    const context = this;
    const args = arguments;

    const later = () => {
      func.apply(context, args);
    };

    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
};

exports.debounce = debounce;

},{}]},{},[1])
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9ibG9ja3Mvc2VjdGlvbi12aWRlb3MtY2Fyb3VzZWwtYXNpZGUtaGVhZGVyLmpzIiwic3JjL3BsdWdpbnMvdm9kaS1leHRlbnNpb25zL2Fzc2V0cy9lc25leHQvY29tcG9uZW50cy9DYXJvdXNlbEFyZ3MuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9jb21wb25lbnRzL0Rlc2lnbk9wdGlvbnMuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9jb21wb25lbnRzL0l0ZW0uanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9jb21wb25lbnRzL0l0ZW1MaXN0LmpzIiwic3JjL3BsdWdpbnMvdm9kaS1leHRlbnNpb25zL2Fzc2V0cy9lc25leHQvY29tcG9uZW50cy9Qb3N0U2VsZWN0b3IuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9jb21wb25lbnRzL1Nob3J0Y29kZUF0dHMuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9jb21wb25lbnRzL1Rlcm1TZWxlY3Rvci5qcyIsInNyYy9wbHVnaW5zL3ZvZGktZXh0ZW5zaW9ucy9hc3NldHMvZXNuZXh0L3V0aWxzL2FwaS5qcyIsInNyYy9wbHVnaW5zL3ZvZGktZXh0ZW5zaW9ucy9hc3NldHMvZXNuZXh0L3V0aWxzL3VzZWZ1bC1mdW5jcy5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTs7O0FDQUE7O0FBQ0E7O0FBQ0E7O0FBRUEsTUFBTTtBQUFFLEVBQUE7QUFBRixJQUFTLEVBQUUsQ0FBQyxJQUFsQjtBQUNBLE1BQU07QUFBRSxFQUFBO0FBQUYsSUFBd0IsRUFBRSxDQUFD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ZDtBQUVBLFNBQU8sWUFBWTtBQUNmLFVBQU0sT0FBTyxHQUFHLElBQWhCO0FBQ0EsVUFBTSxJQUFJLEdBQUcsU0FBYjs7QUFFQSxVQUFNLEtBQUssR0FBRyxNQUFNO0FBQ2hCLE1BQUEsSUFBSSxDQUFDLEtBQUwsQ0FBVyxPQUFYLEVBQW9CLElBQXBCO0FBQ0gsS0FGRDs7QUFJQSxJQUFBLFlBQVksQ0FBQyxPQUFELENBQVo7QUFDQSxJQUFBLE9BQU8sR0FBRyxVQUFVLENBQUMsS0FBRCxFQUFRLElBQVIsQ0FBcEI7QUFDSCxHQVZEO0FBV0gsQ0FkTSIsImZpbGUiOiJnZW5lcmF0ZWQuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uKCl7ZnVuY3Rpb24gcihlLG4sdCl7ZnVuY3Rpb24gbyhpLGYpe2lmKCFuW2ldKXtpZighZVtpXSl7dmFyIGM9XCJmdW5jdGlvblwiPT10eXBlb2YgcmVxdWlyZSYmcmVxdWlyZTtpZighZiYmYylyZXR1cm4gYyhpLCEwKTtpZih1KXJldHVybiB1KGksITApO3ZhciBhPW5ldyBFcnJvcihcIkNhbm5vdCBmaW5kIG1vZHVsZSAnXCIraStcIidcIik7dGhyb3cgYS5jb2RlPVwiTU9EVUxFX05PVF9GT1VORFwiLGF9dmFyIHA9bltpXT17ZXhwb3J0czp7fX07ZVtpXVswXS5jYWxsKHAuZXhwb3J0cyxmdW5jdGlvbihyKXt2YXIgbj1lW2ldWzFdW3JdO3JldHVybiBvKG58fHIpfSxwLHAuZXhwb3J0cyxyLGUsbix0KX1yZXR1cm4gbltpXS5leHBvcnRzfWZvcih2YXIgdT1cImZ1bmN0aW9uXCI9PXR5cGVvZiByZXF1aXJlJiZyZXF1aXJlLGk9MDtpPHQubGVuZ3RoO2krKylvKHRbaV0pO3JldHVybiBvfXJldHVybiByfSkoKSIsImltcG9ydCB7IFNob3J0Y29kZUF0dHMgfSBmcm9tICcuLi9jb21wb25lbnRzL1Nob3J0Y29kZUF0dHMnO1xuaW1wb3J0IHsgQ2Fyb3VzZWxBcmdzIH0gZnJvbSAnLi4vY29tcG9uZW50cy9DYXJvdXNlbEFyZ3MnO1xuaW1wb3J0IHsgRGVzaWduT3B0aW9ucyB9IGZyb20gJy4uL2NvbXBvbmVudHMvRGVzaWduT3B0aW9ucyc7XG5cbmNvbnN0IHsgX18gfSA9IHdwLmkxOG47XG5jb25zdCB7IHJlZ2lzdGVyQmxvY2tUeXBlIH0gPSB3cC5ibG9ja3M7XG5jb25zdCB7IEluc3BlY3RvckNvbnRyb2xzIH0gPSB3cC5lZGl0b3I7XG5jb25zdCB7IEZyYWdtZW50IH0gPSB3cC5lbGVtZW50O1xuY29uc3QgeyBTZXJ2ZXJTaWRlUmVuZGVyLCBEaXNhYmxlZCwgUGFuZWxCb2R5LCBUZXh0Q29udHJvbCwgU2VsZWN0Q29udHJvbCB9ID0gd3AuY29tcG9uZW50cztcblxucmVnaXN0ZXJCbG9ja1R5cGUoICd2b2RpL3NlY3Rpb24tdmlkZW9zLWNhcm91c2VsLWFzaWRlLWhlYWRlcicsIHtcbiAgICB0aXRsZTogX18oJ1ZpZGVvcyBDYXJvdXNlbCBBc2lkZSBIZWFkZXIgQmxvY2snLCAndm9kaS1leHRlbnNpb25zJyksXG5cbiAgICBpY29uOiAndmlkZW8tYWx0MicsXG5cbiAgICBjYXRlZ29yeTogJ3ZvZGktYmxvY2tzJyxcblxuICAgIGVkaXQ6ICggKCBwcm9wcyApID0+IHtcbiAgICAgICAgY29uc3QgeyBhdHRyaWJ1dGVzLCBzZXRBdHRyaWJ1dGVzIH0gPSBwcm9wcztcbiAgICAgICAgY29uc3QgeyBzZWN0aW9uX3RpdGxlLCBzZWN0aW9uX3N1YnRpdGxlLCBhY3Rpb25fdGV4dCwgYWN0aW9uX2xpbmssIGhlYWRlcl9wb3Npc2l0aW9uLCBzZWN0aW9uX2JhY2tncm91bmQsIHNlY3Rpb25fc3R5bGUsIHNob3J0Y29kZV9hdHRzLCBjYXJvdXNlbF9hcmdzLCBkZXNpZ25fb3B0aW9ucyB9ID0gYXR0cmlidXRlcztcblxuICAgICAgICBjb25zdCBvbkNoYW5nZVNlY3Rpb25UaXRsZSA9IG5ld1NlY3Rpb25UaXRsZSA9PiB7XG4gICAgICAgICAgICBzZXRBdHRyaWJ1dGVzKCB7IHNlY3Rpb25fdGl0bGU6IG5ld1NlY3Rpb25UaXRsZSB9ICk7XG4gICAgICAgIH07XG5cbiAgICAgICAgY29uc3Qgb25DaGFuZ2VTZWN0aW9uU3VidGl0bGUgPSBuZXdTZWN0aW9uU3VidGl0bGUgPT4ge1xuICAgICAgICAgICAgc2V0QXR0cmlidXRlcyggeyBzZWN0aW9uX3N1YnRpdGxlOiBuZXdTZWN0aW9uU3VidGl0bGUgfSApO1xuICAgICAgICB9O1xuICAgICAgICBcbiAgICAgICAgY29uc3Qgb25DaGFuZ2VBY3Rpb25UZXh0ID0gbmV3QWN0aW9uVGV4dCA9PiB7XG4gICAgICAgICAgICBzZXRBdHRyaWJ1dGVzKCB7IGFjdGlvbl90ZXh0OiBuZXdBY3Rpb25UZXh0IH0gKTtcbiAgICAgICAgfTtcblxuICAgICAgICBjb25zdCBvbkNoYW5nZUFjdGlvbkxpbmsgPSBuZXdBY3Rpb25MaW5rID0+IHtcbiAgICAgICAgICAgIHNldEF0dHJpYnV0ZXMoIHsgYWN0aW9uX2xpbms6IG5ld0FjdGlvbkxpbmsgfSApO1xuICAgICAgICB9O1xuXG4gICAgICAgIGNvbnN0IG9uQ2hhbmdlSGVhZGVyUG9zaXRpb24gPSBuZXdIZWFkZXJQb3NpdGlvbiA9PiB7XG4gICAgICAgICAgICBzZXRBdHRyaWJ1dGVzKCB7IGhlYWRlcl9wb3Npc2l0aW9uOiBuZXdIZWFkZXJQb3NpdGlvbiB9ICk7XG4gICAgICAgIH07XG5cbiAgICAgICAgY29uc3Qgb25DaGFuZ2VTZWN0aW9uQmFja2dyb3VuZCA9IG5ld1NlY3Rpb25CYWNrZ3JvdW5kID0+IHtcbiAgICAgICAgICAgIHNldEF0dHJpYnV0ZXMoIHsgc2VjdGlvbl9iYWNrZ3JvdW5kOiBuZXdTZWN0aW9uQmFja2dyb3VuZCB9ICk7XG4gICAgICAgIH07XG5cbiAgICAgICAgY29uc3Qgb25DaGFuZ2VTZWN0aW9uU3R5bGUgPSBuZXdTZWN0aW9uU3R5bGUgPT4ge1xuICAgICAgICAgICAgc2V0QXR0cmlidXRlcyggeyBzZWN0aW9uX3N0eWxlOiBuZXdTZWN0aW9uU3R5bGUgfSApO1xuICAgICAgICB9O1xuXG4gICAgICAgIGNvbnN0IG9uQ2hhbmdlU2hvcnRjb2RlQXR0cyA9IG5ld1Nob3J0Y29kZUF0dHMgPT4ge1xuICAgICAgICAgICAgc2V0QXR0cmlidXRlcyggeyBzaG9ydGNvZGVfYXR0czogeyAuLi5zaG9ydGNvZGVfYXR0cywgLi4ubmV3U2hvcnRjb2RlQXR0cyB9IH0gKTtcbiAgICAgICAgfTtcblxuICAgICAgICBjb25zdCBvbkNoYW5nZUNhcm91c2VsQXJncyA9IG5ld0Nhcm91c2VsQXJncyA9PiB7XG4gICAgICAgICAgICBzZXRBdHRyaWJ1dGVzKCB7IGNhcm91c2VsX2FyZ3M6IHsgLi4uY2Fyb3VzZWxfYXJncywgLi4ubmV3Q2Fyb3VzZWxBcmdzIH0gfSApO1xuICAgICAgICB9O1xuXG4gICAgICAgIGNvbnN0IG9uQ2hhbmdlRGVzaWduT3B0aW9ucyA9IG5ld0Rlc2lnbk9wdGlvbnMgPT4ge1xuICAgICAgICAgICAgc2V0QXR0cmlidXRlcyggeyBkZXNpZ25fb3B0aW9uczogeyAuLi5kZXNpZ25fb3B0aW9ucywgLi4ubmV3RGVzaWduT3B0aW9ucyB9IH0gKTtcbiAgICAgICAgfTtcblxuICAgICAgICByZXR1cm4gKFxuICAgICAgICAgICAgPEZyYWdtZW50PlxuICAgICAgICAgICAgICAgIDxJbnNwZWN0b3JDb250cm9scz5cbiAgICAgICAgICAgICAgICAgICAgPFRleHRDb250cm9sXG4gICAgICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ1NlY3Rpb24gVGl0bGUnLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IHNlY3Rpb25fdGl0bGUgfVxuICAgICAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyBvbkNoYW5nZVNlY3Rpb25UaXRsZSB9XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgIDxUZXh0Q29udHJvbFxuICAgICAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdTZWN0aW9uIFN1YnRpdGxlJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBzZWN0aW9uX3N1YnRpdGxlIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgb25DaGFuZ2VTZWN0aW9uU3VidGl0bGUgfVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICA8VGV4dENvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnQWN0aW9uIFRleHQnLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IGFjdGlvbl90ZXh0IH1cbiAgICAgICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgb25DaGFuZ2VBY3Rpb25UZXh0IH1cbiAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICAgICAgPFRleHRDb250cm9sXG4gICAgICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ0FjdGlvbiBMaW5rJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBhY3Rpb25fbGluayB9XG4gICAgICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IG9uQ2hhbmdlQWN0aW9uTGluayB9XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgIDxTZWxlY3RDb250cm9sXG4gICAgICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ0hlYWRlciBQb3NpdGlvbicsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgaGVhZGVyX3Bvc2lzaXRpb24gfVxuICAgICAgICAgICAgICAgICAgICAgICAgb3B0aW9ucz17IFtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB7IGxhYmVsOiBfXygnTGVmdCcsICd2b2RpLWV4dGVuc2lvbnMnKSwgdmFsdWU6ICdoZWFkZXItbGVmdCcgfSxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB7IGxhYmVsOiBfXygnUmlnaHQnLCAndm9kaS1leHRlbnNpb25zJyksIHZhbHVlOiAnaGVhZGVyLXJpZ2h0JyB9LFxuICAgICAgICAgICAgICAgICAgICAgICAgXSB9XG4gICAgICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IG9uQ2hhbmdlSGVhZGVyUG9zaXRpb24gfVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICA8U2VsZWN0Q29udHJvbFxuICAgICAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdCYWNrZ3JvdW5kIENvbG9yJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBzZWN0aW9uX2JhY2tncm91bmQgfVxuICAgICAgICAgICAgICAgICAgICAgICAgb3B0aW9ucz17IFtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB7IGxhYmVsOiBfXygnRGVmYXVsdCcsICd2b2RpLWV4dGVuc2lvbnMnKSwgdmFsdWU6ICcnIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgeyBsYWJlbDogX18oJ0RhcmsnLCAndm9kaS1leHRlbnNpb25zJyksIHZhbHVlOiAnZGFyaycgfSxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB7IGxhYmVsOiBfXygnTW9yZSBEYXJrJywgJ3ZvZGktZXh0ZW5zaW9ucycpLCB2YWx1ZTogJ2RhcmsgbW9yZS1kYXJrJyB9LFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHsgbGFiZWw6IF9fKCdMZXNzIERhcmsnLCAndm9kaS1leHRlbnNpb25zJyksIHZhbHVlOiAnZGFyayBsZXNzLWRhcmsnIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgeyBsYWJlbDogX18oJ0xpZ2h0JywgJ3ZvZGktZXh0ZW5zaW9ucycpLCB2YWx1ZTogJ2xpZ2h0JyB9LFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHsgbGFiZWw6IF9fKCdNb3JlIExpZ2h0JywgJ3ZvZGktZXh0ZW5zaW9ucycpLCB2YWx1ZTogJ2xpZ2h0IG1vcmUtbGlnaHQnIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICBdIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgb25DaGFuZ2VTZWN0aW9uQmFja2dyb3VuZCB9XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgIDxTZWxlY3RDb250cm9sXG4gICAgICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ1N0eWxlJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBzZWN0aW9uX3N0eWxlIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIG9wdGlvbnM9eyBbXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgeyBsYWJlbDogX18oJ1N0eWxlIDEnLCAndm9kaS1leHRlbnNpb25zJyksIHZhbHVlOiAnJyB9LFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHsgbGFiZWw6IF9fKCdTdHlsZSAyJywgJ3ZvZGktZXh0ZW5zaW9ucycpLCB2YWx1ZTogJ3N0eWxlLTInIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICBdIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgb25DaGFuZ2VTZWN0aW9uU3R5bGUgfVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICA8UGFuZWxCb2R5XG4gICAgICAgICAgICAgICAgICAgICAgICB0aXRsZT17X18oJ1ZpZGVvcyBBdHRyaWJ1dGVzJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgaW5pdGlhbE9wZW49eyB0cnVlIH1cbiAgICAgICAgICAgICAgICAgICAgPlxuICAgICAgICAgICAgICAgICAgICAgICAgPFNob3J0Y29kZUF0dHNcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBwb3N0VHlwZSA9ICd2aWRlbydcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjYXRUYXhvbm9teSA9ICd2aWRlb19jYXQnXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGFnVGF4b25vbXkgPSAndmlkZW9fdGFnJ1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGhpZGVGaWVsZHMgPSB7IFsnY29sdW1ucycsICd0b3BfcmF0ZWQnXSB9XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYXR0cmlidXRlcyA9IHsgeyAuLi5zaG9ydGNvZGVfYXR0cyB9IH1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB1cGRhdGVTaG9ydGNvZGVBdHRzID0geyBvbkNoYW5nZVNob3J0Y29kZUF0dHMgfVxuICAgICAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICAgICAgPC9QYW5lbEJvZHk+XG4gICAgICAgICAgICAgICAgICAgICA8UGFuZWxCb2R5XG4gICAgICAgICAgICAgICAgICAgICAgICB0aXRsZT17X18oJ0Nhcm91c2VsIEFyZ3MnLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgICAgICBpbml0aWFsT3Blbj17IHRydWUgfVxuICAgICAgICAgICAgICAgICAgICA+XG4gICAgICAgICAgICAgICAgICAgICAgICA8Q2Fyb3VzZWxBcmdzXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYXR0cmlidXRlcyA9IHsgeyAuLi5jYXJvdXNlbF9hcmdzIH0gfVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHVwZGF0ZUNhcm91c2VsQXJncyA9IHsgb25DaGFuZ2VDYXJvdXNlbEFyZ3MgfVxuICAgICAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICAgICAgPC9QYW5lbEJvZHk+XG4gICAgICAgICAgICAgICAgICAgIDxQYW5lbEJvZHlcbiAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlPXtfXygnRGVzaWduIE9wdGlvbnMnLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgICAgICBpbml0aWFsT3Blbj17IGZhbHNlIH1cbiAgICAgICAgICAgICAgICAgICAgPlxuICAgICAgICAgICAgICAgICAgICAgICAgPERlc2lnbk9wdGlvbnNcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBhdHRyaWJ1dGVzID0geyB7IC4uLmRlc2lnbl9vcHRpb25zIH0gfVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHVwZGF0ZURlc2lnbk9wdGlvbnMgPSB7IG9uQ2hhbmdlRGVzaWduT3B0aW9ucyB9XG4gICAgICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICA8L1BhbmVsQm9keT5cbiAgICAgICAgICAgICAgICA8L0luc3BlY3RvckNvbnRyb2xzPlxuICAgICAgICAgICAgICAgIDxEaXNhYmxlZD5cbiAgICAgICAgICAgICAgICAgICAgPFNlcnZlclNpZGVSZW5kZXJcbiAgICAgICAgICAgICAgICAgICAgICAgIGJsb2NrPVwidm9kaS9zZWN0aW9uLXZpZGVvcy1jYXJvdXNlbC1hc2lkZS1oZWFkZXJcIlxuICAgICAgICAgICAgICAgICAgICAgICAgYXR0cmlidXRlcz17IGF0dHJpYnV0ZXMgfVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDwvRGlzYWJsZWQ+XG4gICAgICAgICAgICA8L0ZyYWdtZW50PlxuICAgICAgICApO1xuICAgIH0gKSxcblxuICAgIHNhdmUoKSB7XG4gICAgICAgIC8vIFJlbmRlcmluZyBpbiBQSFBcbiAgICAgICAgcmV0dXJuIG51bGw7XG4gICAgfSxcbn0gKTsiLCJjb25zdCB7IF9fIH0gPSB3cC5pMThuO1xuY29uc3QgeyBDb21wb25lbnQgfSA9IHdwLmVsZW1lbnQ7XG5jb25zdCB7IFJhbmdlQ29udHJvbCwgQ2hlY2tib3hDb250cm9sIH0gPSB3cC5jb21wb25lbnRzO1xuXG4vKipcbiAqIENhcm91c2VsQXJncyBDb21wb25lbnRcbiAqL1xuZXhwb3J0IGNsYXNzIENhcm91c2VsQXJncyBleHRlbmRzIENvbXBvbmVudCB7XG4gICAgLyoqXG4gICAgICogQ29uc3RydWN0b3IgZm9yIENhcm91c2VsQXJncyBDb21wb25lbnQuXG4gICAgICogU2V0cyB1cCBzdGF0ZSwgYW5kIGNyZWF0ZXMgYmluZGluZ3MgZm9yIGZ1bmN0aW9ucy5cbiAgICAgKiBAcGFyYW0gb2JqZWN0IHByb3BzIC0gY3VycmVudCBjb21wb25lbnQgcHJvcGVydGllcy5cbiAgICAgKi9cbiAgICBjb25zdHJ1Y3Rvcihwcm9wcykge1xuICAgICAgICBzdXBlciguLi5hcmd1bWVudHMpO1xuICAgICAgICB0aGlzLnByb3BzID0gcHJvcHM7XG5cbiAgICAgICAgdGhpcy5vbkNoYW5nZVNsaWRlc1RvU2hvdyA9IHRoaXMub25DaGFuZ2VTbGlkZXNUb1Nob3cuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZVNsaWRlc1RvU2Nyb2xsID0gdGhpcy5vbkNoYW5nZVNsaWRlc1RvU2Nyb2xsLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VEb3RzID0gdGhpcy5vbkNoYW5nZURvdHMuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZUFycm93cyA9IHRoaXMub25DaGFuZ2VBcnJvd3MuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZUF1dG9wbGF5ID0gdGhpcy5vbkNoYW5nZUF1dG9wbGF5LmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VJbmZpbml0ZSA9IHRoaXMub25DaGFuZ2VJbmZpbml0ZS5iaW5kKHRoaXMpO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlU2xpZGVzVG9TaG93KCBuZXdTbGlkZXNUb1Nob3cgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlQ2Fyb3VzZWxBcmdzKHtcbiAgICAgICAgICAgIHNsaWRlc1RvU2hvdzogbmV3U2xpZGVzVG9TaG93XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlU2xpZGVzVG9TY3JvbGwoIG5ld1NsaWRlc1RvU2Nyb2xsICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZUNhcm91c2VsQXJncyh7XG4gICAgICAgICAgICBzbGlkZXNUb1Njcm9sbDogbmV3U2xpZGVzVG9TY3JvbGxcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VEb3RzKCBuZXdEb3RzICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZUNhcm91c2VsQXJncyh7XG4gICAgICAgICAgICBkb3RzOiBuZXdEb3RzXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlQXJyb3dzKCBuZXdBcnJvd3MgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlQ2Fyb3VzZWxBcmdzKHtcbiAgICAgICAgICAgIGFycm93czogbmV3QXJyb3dzXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlQXV0b3BsYXkoIG5ld0F1dG9wbGF5ICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZUNhcm91c2VsQXJncyh7XG4gICAgICAgICAgICBhdXRvcGxheTogbmV3QXV0b3BsYXlcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VJbmZpbml0ZSggbmV3SW5maW5pdGUgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlQ2Fyb3VzZWxBcmdzKHtcbiAgICAgICAgICAgIGluZmluaXRlOiBuZXdJbmZpbml0ZVxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBSZW5kZXJzIHRoZSBDYXJvdXNlbEFyZ3MgY29tcG9uZW50LlxuICAgICAqL1xuICAgIHJlbmRlcigpIHtcbiAgICAgICAgY29uc3QgeyBhdHRyaWJ1dGVzIH0gPSB0aGlzLnByb3BzO1xuICAgICAgICBjb25zdCB7IHNsaWRlc1RvU2hvdywgc2xpZGVzVG9TY3JvbGwsIGRvdHMsIGFycm93cywgYXV0b3BsYXksIGluZmluaXRlIH0gPSBhdHRyaWJ1dGVzO1xuXG4gICAgICAgIHJldHVybiAoXG4gICAgICAgICAgICA8ZGl2PlxuICAgICAgICAgICAgICAgIDxSYW5nZUNvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdTbGlkZSBUbyBTaG93JywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IHNsaWRlc1RvU2hvdyB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZVNsaWRlc1RvU2hvdyB9XG4gICAgICAgICAgICAgICAgICAgIG1pbj17IDEgfVxuICAgICAgICAgICAgICAgICAgICBtYXg9eyA4IH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDxSYW5nZUNvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdTbGlkZXMgVG8gU2Nyb2xsJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IHNsaWRlc1RvU2Nyb2xsIH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlU2xpZGVzVG9TY3JvbGwgfVxuICAgICAgICAgICAgICAgICAgICBtaW49eyAxIH1cbiAgICAgICAgICAgICAgICAgICAgbWF4PXsgOCB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8Q2hlY2tib3hDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnRG90cycsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgaGVscD17X18oJ0NoZWNrIHRvIHNob3cgY2Fyb3VzZWwgZG90cy4nLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIGNoZWNrZWQ9eyBkb3RzIH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlRG90cyB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8Q2hlY2tib3hDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnQXJyb3dzJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICBoZWxwPXtfXygnQ2hlY2sgdG8gc2hvdyBjYXJvdXNlbCBhcnJvd3MuJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICBjaGVja2VkPXsgYXJyb3dzIH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlQXJyb3dzIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDxDaGVja2JveENvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdBdXRvcGxheScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgaGVscD17X18oJ0NoZWNrIHRvIGF1dG9wbGF5IGNhcm91c2VsLicsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgY2hlY2tlZD17IGF1dG9wbGF5IH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlQXV0b3BsYXkgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPENoZWNrYm94Q29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ0luZmluaXRlIFNjcm9sbCcsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgaGVscD17X18oJ0NoZWNrIHRvIGluZmluaXRlIHNjcm9sbCBjYXJvdXNlbC4nLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIGNoZWNrZWQ9eyBpbmZpbml0ZSB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZUluZmluaXRlIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICk7XG4gICAgfVxufSIsImNvbnN0IHsgX18gfSA9IHdwLmkxOG47XG5jb25zdCB7IENvbXBvbmVudCB9ID0gd3AuZWxlbWVudDtcbmNvbnN0IHsgUmFuZ2VDb250cm9sIH0gPSB3cC5jb21wb25lbnRzO1xuXG4vKipcbiAqIERlc2lnbk9wdGlvbnMgQ29tcG9uZW50XG4gKi9cbmV4cG9ydCBjbGFzcyBEZXNpZ25PcHRpb25zIGV4dGVuZHMgQ29tcG9uZW50IHtcbiAgICAvKipcbiAgICAgKiBDb25zdHJ1Y3RvciBmb3IgRGVzaWduT3B0aW9ucyBDb21wb25lbnQuXG4gICAgICogU2V0cyB1cCBzdGF0ZSwgYW5kIGNyZWF0ZXMgYmluZGluZ3MgZm9yIGZ1bmN0aW9ucy5cbiAgICAgKiBAcGFyYW0gb2JqZWN0IHByb3BzIC0gY3VycmVudCBjb21wb25lbnQgcHJvcGVydGllcy5cbiAgICAgKi9cbiAgICBjb25zdHJ1Y3Rvcihwcm9wcykge1xuICAgICAgICBzdXBlciguLi5hcmd1bWVudHMpO1xuICAgICAgICB0aGlzLnByb3BzID0gcHJvcHM7XG5cbiAgICAgICAgdGhpcy5vbkNoYW5nZVBhZGRpbmdUb3AgPSB0aGlzLm9uQ2hhbmdlUGFkZGluZ1RvcC5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlUGFkZGluZ0JvdHRvbSA9IHRoaXMub25DaGFuZ2VQYWRkaW5nQm90dG9tLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VQYWRkaW5nTGVmdCA9IHRoaXMub25DaGFuZ2VQYWRkaW5nTGVmdC5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlUGFkZGluZ1JpZ2h0ID0gdGhpcy5vbkNoYW5nZVBhZGRpbmdSaWdodC5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlTWFyZ2luVG9wID0gdGhpcy5vbkNoYW5nZU1hcmdpblRvcC5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlTWFyZ2luQm90dG9tID0gdGhpcy5vbkNoYW5nZU1hcmdpbkJvdHRvbS5iaW5kKHRoaXMpO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlUGFkZGluZ1RvcCggbmV3b25DaGFuZ2VQYWRkaW5nVG9wICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZURlc2lnbk9wdGlvbnMoe1xuICAgICAgICAgICAgcGFkZGluZ190b3A6IG5ld29uQ2hhbmdlUGFkZGluZ1RvcFxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZVBhZGRpbmdCb3R0b20oIG5ld29uQ2hhbmdlUGFkZGluZ0JvdHRvbSApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVEZXNpZ25PcHRpb25zKHtcbiAgICAgICAgICAgIHBhZGRpbmdfYm90dG9tOiBuZXdvbkNoYW5nZVBhZGRpbmdCb3R0b21cbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VQYWRkaW5nTGVmdCggbmV3b25DaGFuZ2VQYWRkaW5nTGVmdCApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVEZXNpZ25PcHRpb25zKHtcbiAgICAgICAgICAgIHBhZGRpbmdfbGVmdDogbmV3b25DaGFuZ2VQYWRkaW5nTGVmdFxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZVBhZGRpbmdSaWdodCggbmV3b25DaGFuZ2VQYWRkaW5nUmlnaHQgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlRGVzaWduT3B0aW9ucyh7XG4gICAgICAgICAgICBwYWRkaW5nX3JpZ2h0OiBuZXdvbkNoYW5nZVBhZGRpbmdSaWdodFxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZU1hcmdpblRvcCggbmV3b25DaGFuZ2VNYXJnaW5Ub3AgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlRGVzaWduT3B0aW9ucyh7XG4gICAgICAgICAgICBtYXJnaW5fdG9wOiBuZXdvbkNoYW5nZU1hcmdpblRvcFxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZU1hcmdpbkJvdHRvbSggbmV3b25DaGFuZ2VNYXJnaW5Cb3R0b20gKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlRGVzaWduT3B0aW9ucyh7XG4gICAgICAgICAgICBtYXJnaW5fYm90dG9tOiBuZXdvbkNoYW5nZU1hcmdpbkJvdHRvbVxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBSZW5kZXJzIHRoZSBEZXNpZ25PcHRpb25zIGNvbXBvbmVudC5cbiAgICAgKi9cbiAgICByZW5kZXIoKSB7XG4gICAgICAgIGNvbnN0IHsgYXR0cmlidXRlcyB9ID0gdGhpcy5wcm9wcztcbiAgICAgICAgY29uc3QgeyBwYWRkaW5nX3RvcCwgcGFkZGluZ19ib3R0b20sIHBhZGRpbmdfbGVmdCwgcGFkZGluZ19yaWdodCwgbWFyZ2luX3RvcCwgbWFyZ2luX2JvdHRvbSB9ID0gYXR0cmlidXRlcztcblxuICAgICAgICByZXR1cm4gKFxuICAgICAgICAgICAgPGRpdj5cbiAgICAgICAgICAgICAgICA8UmFuZ2VDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnUGFkZGluZyBUb3AgKHB4KScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBwYWRkaW5nX3RvcCB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZVBhZGRpbmdUb3AgfVxuICAgICAgICAgICAgICAgICAgICBtaW49eyAwIH1cbiAgICAgICAgICAgICAgICAgICAgbWF4PXsgMTAwIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDxSYW5nZUNvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdQYWRkaW5nIEJvdHRvbSAocHgpJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IHBhZGRpbmdfYm90dG9tIH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlUGFkZGluZ0JvdHRvbSB9XG4gICAgICAgICAgICAgICAgICAgIG1pbj17IDAgfVxuICAgICAgICAgICAgICAgICAgICBtYXg9eyAxMDAgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPFJhbmdlQ29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ1BhZGRpbmcgTGVmdCAocHgpJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IHBhZGRpbmdfbGVmdCB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZVBhZGRpbmdMZWZ0IH1cbiAgICAgICAgICAgICAgICAgICAgbWluPXsgMCB9XG4gICAgICAgICAgICAgICAgICAgIG1heD17IDEwMCB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8UmFuZ2VDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnUGFkZGluZyBSaWdodCAocHgpJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IHBhZGRpbmdfcmlnaHQgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VQYWRkaW5nUmlnaHQgfVxuICAgICAgICAgICAgICAgICAgICBtaW49eyAwIH1cbiAgICAgICAgICAgICAgICAgICAgbWF4PXsgMTAwIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDxSYW5nZUNvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdNYXJnaW4gVG9wIChweCknLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgbWFyZ2luX3RvcCB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZU1hcmdpblRvcCB9XG4gICAgICAgICAgICAgICAgICAgIG1pbj17IC0xMDAgfVxuICAgICAgICAgICAgICAgICAgICBtYXg9eyAxMDAgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPFJhbmdlQ29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ01hcmdpbiBCb3R0b20gKHB4KScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBtYXJnaW5fYm90dG9tIH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlTWFyZ2luQm90dG9tIH1cbiAgICAgICAgICAgICAgICAgICAgbWluPXsgLTEwMCB9XG4gICAgICAgICAgICAgICAgICAgIG1heD17IDEwMCB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICApO1xuICAgIH1cbn0iLCJcbi8qKlxuICogSXRlbSBDb21wb25lbnQuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IGl0ZW1UaXRsZSAtIEN1cnJlbnQgaXRlbSB0aXRsZS5cbiAqIEBwYXJhbSB7ZnVuY3Rpb259IGNsaWNrSGFuZGxlciAtIHRoaXMgaXMgdGhlIGhhbmRsaW5nIGZ1bmN0aW9uIGZvciB0aGUgYWRkL3JlbW92ZSBmdW5jdGlvblxuICogQHBhcmFtIHtJbnRlZ2VyfSBpdGVtSWQgLSBDdXJyZW50IGl0ZW0gSURcbiAqIEBwYXJhbSBpY29uXG4gKiBAcmV0dXJucyB7Kn0gSXRlbSBIVE1MLlxuICovXG5leHBvcnQgY29uc3QgSXRlbSA9ICh7IHRpdGxlOiB7IHJlbmRlcmVkOiBpdGVtVGl0bGUgfSA9IHt9LCBuYW1lLCBjbGlja0hhbmRsZXIsIGlkOiBpdGVtSWQsIGljb24gfSkgPT4gKFxuICAgIDxhcnRpY2xlIGNsYXNzTmFtZT1cIml0ZW1cIj5cbiAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJpdGVtLWJvZHlcIj5cbiAgICAgICAgICAgIDxoMyBjbGFzc05hbWU9XCJpdGVtLXRpdGxlXCIgc3R5bGU9e3ttYXJnaW5Ub3A6ICcwJ319PntpdGVtVGl0bGV9e25hbWV9PC9oMz5cbiAgICAgICAgPC9kaXY+XG4gICAgICAgIDxidXR0b24gb25DbGljaz17KCkgPT4gY2xpY2tIYW5kbGVyKGl0ZW1JZCl9PntpY29ufTwvYnV0dG9uPlxuICAgIDwvYXJ0aWNsZT5cbik7IiwiaW1wb3J0IHsgSXRlbSB9IGZyb20gJy4vSXRlbSc7XG5cbmNvbnN0IHsgX18gfSA9IHdwLmkxOG47XG5cbi8qKlxuICogSXRlbUxpc3QgQ29tcG9uZW50XG4gKiBAcGFyYW0gb2JqZWN0IHByb3BzIC0gQ29tcG9uZW50IHByb3BzLlxuICogQHJldHVybnMgeyp9XG4gKiBAY29uc3RydWN0b3JcbiAqL1xuZXhwb3J0IGNvbnN0IEl0ZW1MaXN0ID0gcHJvcHMgPT4ge1xuICAgIGNvbnN0IHsgZmlsdGVyZWQgPSBmYWxzZSwgbG9hZGluZyA9IGZhbHNlLCBpdGVtcyA9IFtdLCBhY3Rpb24gPSAoKSA9PiB7fSwgaWNvbiA9IG51bGwgfSA9IHByb3BzO1xuXG4gICAgaWYgKGxvYWRpbmcpIHtcbiAgICAgICAgcmV0dXJuIDxwIGNsYXNzTmFtZT1cImxvYWRpbmctaXRlbXNcIj57X18oJ0xvYWRpbmcgLi4uJywgJ3ZvZGktZXh0ZW5zaW9ucycpfTwvcD47XG4gICAgfVxuXG4gICAgaWYgKGZpbHRlcmVkICYmIGl0ZW1zLmxlbmd0aCA8IDEpIHtcbiAgICAgICAgcmV0dXJuIChcbiAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiaXRlbS1saXN0XCI+XG4gICAgICAgICAgICAgICAgPHA+e19fKCdZb3VyIHF1ZXJ5IHlpZWxkZWQgbm8gcmVzdWx0cywgcGxlYXNlIHRyeSBhZ2Fpbi4nLCAndm9kaS1leHRlbnNpb25zJyl9PC9wPlxuICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICk7XG4gICAgfVxuXG4gICAgaWYgKCAhIGl0ZW1zIHx8IGl0ZW1zLmxlbmd0aCA8IDEgKSB7XG4gICAgICAgIHJldHVybiA8cCBjbGFzc05hbWU9XCJuby1pdGVtc1wiPntfXygnTm90IGZvdW5kLicsICd2b2RpLWV4dGVuc2lvbnMnKX08L3A+XG4gICAgfVxuXG4gICAgcmV0dXJuIChcbiAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJpdGVtLWxpc3RcIj5cbiAgICAgICAgICAgIHtpdGVtcy5tYXAoKGl0ZW0pID0+IDxJdGVtIGtleT17aXRlbS5pZH0gey4uLml0ZW19IGNsaWNrSGFuZGxlcj17YWN0aW9ufSBpY29uPXtpY29ufSAvPil9XG4gICAgICAgIDwvZGl2PlxuICAgICk7XG59OyIsImltcG9ydCB7IEl0ZW1MaXN0IH0gZnJvbSAnLi9JdGVtTGlzdCc7XG5pbXBvcnQgKiBhcyBhcGkgZnJvbSAnLi4vdXRpbHMvYXBpJztcbmltcG9ydCB7IHVuaXF1ZUJ5SWQsIGRlYm91bmNlIH0gZnJvbSAnLi4vdXRpbHMvdXNlZnVsLWZ1bmNzJztcblxuY29uc3QgeyBfXyB9ID0gd3AuaTE4bjtcbmNvbnN0IHsgSWNvbiB9ID0gd3AuY29tcG9uZW50cztcbmNvbnN0IHsgQ29tcG9uZW50IH0gPSB3cC5lbGVtZW50O1xuXG4vKipcbiAqIFBvc3RTZWxlY3RvciBDb21wb25lbnRcbiAqL1xuZXhwb3J0IGNsYXNzIFBvc3RTZWxlY3RvciBleHRlbmRzIENvbXBvbmVudCB7XG4gICAgLyoqXG4gICAgICogQ29uc3RydWN0b3IgZm9yIFBvc3RTZWxlY3RvciBDb21wb25lbnQuXG4gICAgICogU2V0cyB1cCBzdGF0ZSwgYW5kIGNyZWF0ZXMgYmluZGluZ3MgZm9yIGZ1bmN0aW9ucy5cbiAgICAgKiBAcGFyYW0gb2JqZWN0IHByb3BzIC0gY3VycmVudCBjb21wb25lbnQgcHJvcGVydGllcy5cbiAgICAgKi9cbiAgICBjb25zdHJ1Y3Rvcihwcm9wcykge1xuICAgICAgICBzdXBlciguLi5hcmd1bWVudHMpO1xuICAgICAgICB0aGlzLnByb3BzID0gcHJvcHM7XG5cbiAgICAgICAgdGhpcy5zdGF0ZSA9IHtcbiAgICAgICAgICAgIHBvc3RzOiBbXSxcbiAgICAgICAgICAgIGxvYWRpbmc6IGZhbHNlLFxuICAgICAgICAgICAgdHlwZTogcHJvcHMucG9zdFR5cGUgfHwgJ3Bvc3QnLFxuICAgICAgICAgICAgdHlwZXM6IFtdLFxuICAgICAgICAgICAgZmlsdGVyOiAnJyxcbiAgICAgICAgICAgIGZpbHRlckxvYWRpbmc6IGZhbHNlLFxuICAgICAgICAgICAgZmlsdGVyUG9zdHM6IFtdLFxuICAgICAgICAgICAgaW5pdGlhbExvYWRpbmc6IGZhbHNlLFxuICAgICAgICAgICAgc2VsZWN0ZWRQb3N0czogW10sXG4gICAgICAgIH07XG5cbiAgICAgICAgdGhpcy5hZGRQb3N0ID0gdGhpcy5hZGRQb3N0LmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMucmVtb3ZlUG9zdCA9IHRoaXMucmVtb3ZlUG9zdC5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLmhhbmRsZUlucHV0RmlsdGVyQ2hhbmdlID0gdGhpcy5oYW5kbGVJbnB1dEZpbHRlckNoYW5nZS5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLmRvUG9zdEZpbHRlciA9IGRlYm91bmNlKHRoaXMuZG9Qb3N0RmlsdGVyLmJpbmQodGhpcyksIDMwMCk7XG4gICAgICAgIHRoaXMuZ2V0U2VsZWN0ZWRQb3N0SWRzID0gdGhpcy5nZXRTZWxlY3RlZFBvc3RJZHMuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5nZXRTZWxlY3RlZFBvc3RzID0gdGhpcy5nZXRTZWxlY3RlZFBvc3RzLmJpbmQodGhpcyk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogV2hlbiB0aGUgY29tcG9uZW50IG1vdW50cyBpdCBjYWxscyB0aGlzIGZ1bmN0aW9uLlxuICAgICAqIEZldGNoZXMgcG9zdHMgdHlwZXMsIHNlbGVjdGVkIHBvc3RzIHRoZW4gbWFrZXMgZmlyc3QgY2FsbCBmb3IgcG9zdHNcbiAgICAgKi9cbiAgICBjb21wb25lbnREaWRNb3VudCgpIHtcbiAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICBpbml0aWFsTG9hZGluZzogdHJ1ZSxcbiAgICAgICAgfSk7XG5cbiAgICAgICAgYXBpLmdldFBvc3RUeXBlcygpXG4gICAgICAgICAgICAudGhlbigoIHJlc3BvbnNlICkgPT4ge1xuICAgICAgICAgICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgICAgICAgICB0eXBlczogcmVzcG9uc2VcbiAgICAgICAgICAgICAgICB9LCAoKSA9PiB7XG4gICAgICAgICAgICAgICAgICAgIHRoaXMucmV0cmlldmVTZWxlY3RlZFBvc3RzKClcbiAgICAgICAgICAgICAgICAgICAgICAgIC50aGVuKCggc2VsZWN0ZWRQb3N0cyApID0+IHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiggc2VsZWN0ZWRQb3N0cyApIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpbml0aWFsTG9hZGluZzogZmFsc2UsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBzZWxlY3RlZFBvc3RzOiBzZWxlY3RlZFBvc3RzLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGluaXRpYWxMb2FkaW5nOiBmYWxzZSxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEdldFBvc3RzIHdyYXBwZXIsIGJ1aWxkcyB0aGUgcmVxdWVzdCBhcmd1bWVudCBiYXNlZCBzdGF0ZSBhbmQgcGFyYW1ldGVycyBwYXNzZWQvXG4gICAgICogQHBhcmFtIHtvYmplY3R9IGFyZ3MgLSBkZXNpcmVkIGFyZ3VtZW50cyAoY2FuIGJlIGVtcHR5KS5cbiAgICAgKiBAcmV0dXJucyB7UHJvbWlzZTxUPn1cbiAgICAgKi9cbiAgICBnZXRQb3N0cyhhcmdzID0ge30pIHtcbiAgICAgICAgY29uc3QgcG9zdElkcyA9IHRoaXMuZ2V0U2VsZWN0ZWRQb3N0SWRzKCk7XG5cbiAgICAgICAgY29uc3QgZGVmYXVsdEFyZ3MgPSB7XG4gICAgICAgICAgICBwZXJfcGFnZTogMTAsXG4gICAgICAgICAgICB0eXBlOiB0aGlzLnN0YXRlLnR5cGUsXG4gICAgICAgICAgICBzZWFyY2g6IHRoaXMuc3RhdGUuZmlsdGVyLFxuICAgICAgICB9O1xuXG4gICAgICAgIGNvbnN0IHJlcXVlc3RBcmd1bWVudHMgPSB7XG4gICAgICAgICAgICAuLi5kZWZhdWx0QXJncyxcbiAgICAgICAgICAgIC4uLmFyZ3NcbiAgICAgICAgfTtcblxuICAgICAgICByZXF1ZXN0QXJndW1lbnRzLnJlc3RCYXNlID0gdGhpcy5zdGF0ZS50eXBlc1t0aGlzLnN0YXRlLnR5cGVdLnJlc3RfYmFzZTtcblxuICAgICAgICByZXR1cm4gYXBpLmdldFBvc3RzKHJlcXVlc3RBcmd1bWVudHMpXG4gICAgICAgICAgICAudGhlbihyZXNwb25zZSA9PiB7XG4gICAgICAgICAgICAgICAgaWYgKHJlcXVlc3RBcmd1bWVudHMuc2VhcmNoKSB7XG4gICAgICAgICAgICAgICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgICAgICAgICAgICAgZmlsdGVyUG9zdHM6IHJlc3BvbnNlLmZpbHRlcigoeyBpZCB9KSA9PiBwb3N0SWRzLmluZGV4T2YoaWQpID09PSAtMSksXG4gICAgICAgICAgICAgICAgICAgIH0pO1xuXG4gICAgICAgICAgICAgICAgICAgIHJldHVybiByZXNwb25zZTtcbiAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICAgICAgcG9zdHM6IHVuaXF1ZUJ5SWQoWy4uLnRoaXMuc3RhdGUucG9zdHMsIC4uLnJlc3BvbnNlXSksXG4gICAgICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgICAgICAvLyByZXR1cm4gcmVzcG9uc2UgdG8gY29udGludWUgdGhlIGNoYWluXG4gICAgICAgICAgICAgICAgcmV0dXJuIHJlc3BvbnNlO1xuICAgICAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogR2V0cyB0aGUgc2VsZWN0ZWQgcG9zdHMgYnkgaWQgZnJvbSB0aGUgYHBvc3RzYCBzdGF0ZSBvYmplY3QgYW5kIHNvcnRzIHRoZW0gYnkgdGhlaXIgcG9zaXRpb24gaW4gdGhlIHNlbGVjdGVkIGFycmF5LlxuICAgICAqIEByZXR1cm5zIEFycmF5IG9mIG9iamVjdHMuXG4gICAgICovXG4gICAgZ2V0U2VsZWN0ZWRQb3N0SWRzKCkge1xuICAgICAgICBjb25zdCB7IHNlbGVjdGVkUG9zdElkcyB9ID0gdGhpcy5wcm9wcztcblxuICAgICAgICBpZiggc2VsZWN0ZWRQb3N0SWRzICkge1xuICAgICAgICAgICAgY29uc3QgcG9zdElkcyA9IEFycmF5LmlzQXJyYXkoIHNlbGVjdGVkUG9zdElkcyApID8gc2VsZWN0ZWRQb3N0SWRzIDogc2VsZWN0ZWRQb3N0SWRzLnNwbGl0KCcsJyk7XG4gICAgICAgICAgICByZXR1cm4gcG9zdElkcztcbiAgICAgICAgfVxuXG4gICAgICAgIHJldHVybiBbXTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBHZXRzIHRoZSBzZWxlY3RlZCBwb3N0cyBieSBpZCBmcm9tIHRoZSBgcG9zdHNgIHN0YXRlIG9iamVjdCBhbmQgc29ydHMgdGhlbSBieSB0aGVpciBwb3NpdGlvbiBpbiB0aGUgc2VsZWN0ZWQgYXJyYXkuXG4gICAgICogQHJldHVybnMgQXJyYXkgb2Ygb2JqZWN0cy5cbiAgICAgKi9cbiAgICBnZXRTZWxlY3RlZFBvc3RzKCBwb3N0SWRzICkge1xuICAgICAgICAvLyBjb25zdCBmaWx0ZXJQb3N0c0xpc3QgPSB0aGlzLnN0YXRlLmZpbHRlcmluZyAmJiAhdGhpcy5zdGF0ZS5maWx0ZXJMb2FkaW5nID8gdGhpcy5zdGF0ZS5maWx0ZXJQb3N0cyA6IFtdO1xuICAgICAgICBjb25zdCBwb3N0TGlzdCA9IHVuaXF1ZUJ5SWQoW1xuICAgICAgICAgICAgLi4udGhpcy5zdGF0ZS5maWx0ZXJQb3N0cyxcbiAgICAgICAgICAgIC4uLnRoaXMuc3RhdGUucG9zdHNcbiAgICAgICAgXSk7XG4gICAgICAgIGNvbnN0IHNlbGVjdGVkUG9zdHMgPSBwb3N0TGlzdFxuICAgICAgICAgICAgLmZpbHRlcigoeyBpZCB9KSA9PiBwb3N0SWRzLmluZGV4T2YoaWQpICE9PSAtMSlcbiAgICAgICAgICAgIC5zb3J0KChhLCBiKSA9PiB7XG4gICAgICAgICAgICAgICAgY29uc3QgYUluZGV4ID0gcG9zdElkcy5pbmRleE9mKGEuaWQpO1xuICAgICAgICAgICAgICAgIGNvbnN0IGJJbmRleCA9IHBvc3RJZHMuaW5kZXhPZihiLmlkKTtcblxuICAgICAgICAgICAgICAgIGlmIChhSW5kZXggPiBiSW5kZXgpIHtcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIDE7XG4gICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgaWYgKGFJbmRleCA8IGJJbmRleCkge1xuICAgICAgICAgICAgICAgICAgICByZXR1cm4gLTE7XG4gICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgcmV0dXJuIDA7XG4gICAgICAgICAgICB9KTtcblxuICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgIHNlbGVjdGVkUG9zdHM6IHNlbGVjdGVkUG9zdHMsXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIE1ha2VzIHRoZSBuZWNlc3NhcnkgYXBpIGNhbGxzIHRvIGZldGNoIHRoZSBzZWxlY3RlZCBwb3N0cyBhbmQgcmV0dXJucyBhIHByb21pc2UuXG4gICAgICogQHJldHVybnMgeyp9XG4gICAgICovXG4gICAgcmV0cmlldmVTZWxlY3RlZFBvc3RzKCkge1xuICAgICAgICBjb25zdCB7IHBvc3RUeXBlLCBzZWxlY3RlZFBvc3RJZHMgfSA9IHRoaXMucHJvcHM7XG4gICAgICAgIGNvbnN0IHsgdHlwZXMgfSA9IHRoaXMuc3RhdGU7XG5cbiAgICAgICAgY29uc3QgcG9zdElkcyA9IHRoaXMuZ2V0U2VsZWN0ZWRQb3N0SWRzKCkuam9pbignLCcpO1xuXG4gICAgICAgIGlmICggISBwb3N0SWRzICkge1xuICAgICAgICAgICAgLy8gcmV0dXJuIGEgZmFrZSBwcm9taXNlIHRoYXQgYXV0byByZXNvbHZlcy5cbiAgICAgICAgICAgIHJldHVybiBuZXcgUHJvbWlzZSgocmVzb2x2ZSkgPT4gcmVzb2x2ZSgpKTtcbiAgICAgICAgfVxuXG4gICAgICAgIGxldCBwb3N0X2FyZ3MgPSB7XG4gICAgICAgICAgICBpbmNsdWRlOiBwb3N0SWRzLFxuICAgICAgICAgICAgcGVyX3BhZ2U6IDEwMCxcbiAgICAgICAgICAgIHBvc3RUeXBlXG4gICAgICAgIH07XG5cbiAgICAgICAgaWYoIHRoaXMucHJvcHMucG9zdFN0YXR1cyApIHtcbiAgICAgICAgICAgIHBvc3RfYXJncy5zdGF0dXMgPSB0aGlzLnByb3BzLnBvc3RTdGF0dXM7XG4gICAgICAgIH1cblxuICAgICAgICByZXR1cm4gdGhpcy5nZXRQb3N0cyh7XG4gICAgICAgICAgICAuLi5wb3N0X2FyZ3NcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogQWRkcyBkZXNpcmVkIHBvc3QgaWQgdG8gdGhlIHNlbGVjdGVkUG9zdElkcyBMaXN0XG4gICAgICogQHBhcmFtIHtJbnRlZ2VyfSBwb3N0X2lkXG4gICAgICovXG4gICAgYWRkUG9zdChwb3N0X2lkKSB7XG4gICAgICAgIGlmICh0aGlzLnN0YXRlLmZpbHRlcikge1xuICAgICAgICAgICAgY29uc3QgcG9zdCA9IHRoaXMuc3RhdGUuZmlsdGVyUG9zdHMuZmlsdGVyKHAgPT4gcC5pZCA9PT0gcG9zdF9pZCk7XG4gICAgICAgICAgICBjb25zdCBwb3N0cyA9IHVuaXF1ZUJ5SWQoW1xuICAgICAgICAgICAgICAgIC4uLnRoaXMuc3RhdGUucG9zdHMsXG4gICAgICAgICAgICAgICAgLi4ucG9zdFxuICAgICAgICAgICAgXSk7XG5cbiAgICAgICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgICAgIHBvc3RzXG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfVxuXG4gICAgICAgIGlmKCB0aGlzLnByb3BzLnNlbGVjdFNpbmdsZSApIHtcbiAgICAgICAgICAgIGNvbnN0IHNlbGVjdGVkUG9zdElkcyA9IFsgcG9zdF9pZCBdO1xuICAgICAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTZWxlY3RlZFBvc3RJZHMoIHNlbGVjdGVkUG9zdElkcyApO1xuICAgICAgICAgICAgdGhpcy5nZXRTZWxlY3RlZFBvc3RzKCBzZWxlY3RlZFBvc3RJZHMgKTtcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgIGNvbnN0IHBvc3RJZHMgPSB0aGlzLmdldFNlbGVjdGVkUG9zdElkcygpO1xuICAgICAgICAgICAgY29uc3Qgc2VsZWN0ZWRQb3N0SWRzID0gWyAuLi5wb3N0SWRzLCBwb3N0X2lkIF07XG4gICAgICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZVNlbGVjdGVkUG9zdElkcyggc2VsZWN0ZWRQb3N0SWRzICk7XG4gICAgICAgICAgICB0aGlzLmdldFNlbGVjdGVkUG9zdHMoIHNlbGVjdGVkUG9zdElkcyApO1xuICAgICAgICB9XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogUmVtb3ZlcyBkZXNpcmVkIHBvc3QgaWQgdG8gdGhlIHNlbGVjdGVkUG9zdElkcyBMaXN0XG4gICAgICogQHBhcmFtIHtJbnRlZ2VyfSBwb3N0X2lkXG4gICAgICovXG4gICAgcmVtb3ZlUG9zdChwb3N0X2lkKSB7XG4gICAgICAgIGNvbnN0IHBvc3RJZHMgPSB0aGlzLmdldFNlbGVjdGVkUG9zdElkcygpO1xuICAgICAgICBjb25zdCBzZWxlY3RlZFBvc3RJZHMgPSBbIC4uLnBvc3RJZHMgXS5maWx0ZXIoaWQgPT4gaWQgIT09IHBvc3RfaWQpO1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZVNlbGVjdGVkUG9zdElkcyggc2VsZWN0ZWRQb3N0SWRzICk7XG4gICAgICAgIHRoaXMuZ2V0U2VsZWN0ZWRQb3N0cyggc2VsZWN0ZWRQb3N0SWRzICk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogSGFuZGxlcyB0aGUgc2VhcmNoIGJveCBpbnB1dCB2YWx1ZVxuICAgICAqIEBwYXJhbSBzdHJpbmcgdHlwZSAtIGNvbWVzIGZyb20gdGhlIGV2ZW50IG9iamVjdCB0YXJnZXQuXG4gICAgICovXG4gICAgaGFuZGxlSW5wdXRGaWx0ZXJDaGFuZ2UoeyB0YXJnZXQ6IHsgdmFsdWU6ZmlsdGVyID0gJycgfSA9IHt9IH0gPSB7fSkge1xuICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgIGZpbHRlclxuICAgICAgICB9LCAoKSA9PiB7XG4gICAgICAgICAgICBpZiAoIWZpbHRlcikge1xuICAgICAgICAgICAgICAgIC8vIHJlbW92ZSBmaWx0ZXJlZCBwb3N0c1xuICAgICAgICAgICAgICAgIHJldHVybiB0aGlzLnNldFN0YXRlKHsgZmlsdGVyZWRQb3N0czogW10sIGZpbHRlcmluZzogZmFsc2UgfSk7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIHRoaXMuZG9Qb3N0RmlsdGVyKCk7XG4gICAgICAgIH0pXG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogQWN0dWFsIGFwaSBjYWxsIGZvciBzZWFyY2hpbmcgZm9yIHF1ZXJ5LCB0aGlzIGZ1bmN0aW9uIGlzIGRlYm91bmNlZCBpbiBjb25zdHJ1Y3Rvci5cbiAgICAgKi9cbiAgICBkb1Bvc3RGaWx0ZXIoKSB7XG4gICAgICAgIGNvbnN0IHsgZmlsdGVyID0gJycgfSA9IHRoaXMuc3RhdGU7XG5cbiAgICAgICAgaWYgKCFmaWx0ZXIpIHtcbiAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuXG4gICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgZmlsdGVyaW5nOiB0cnVlLFxuICAgICAgICAgICAgZmlsdGVyTG9hZGluZzogdHJ1ZVxuICAgICAgICB9KTtcblxuICAgICAgICBsZXQgcG9zdF9hcmdzID0ge307XG5cbiAgICAgICAgaWYoIHRoaXMucHJvcHMucG9zdFN0YXR1cyApIHtcbiAgICAgICAgICAgIHBvc3RfYXJncy5zdGF0dXMgPSB0aGlzLnByb3BzLnBvc3RTdGF0dXM7XG4gICAgICAgIH1cblxuICAgICAgICB0aGlzLmdldFBvc3RzKHtcbiAgICAgICAgICAgIC4uLnBvc3RfYXJnc1xuICAgICAgICB9KS50aGVuKCgpID0+IHtcbiAgICAgICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgICAgIGZpbHRlckxvYWRpbmc6IGZhbHNlXG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogUmVuZGVycyB0aGUgUG9zdFNlbGVjdG9yIGNvbXBvbmVudC5cbiAgICAgKi9cbiAgICByZW5kZXIoKSB7XG4gICAgICAgIGNvbnN0IHBvc3RMaXN0ID0gdGhpcy5zdGF0ZS5maWx0ZXJpbmcgJiYgIXRoaXMuc3RhdGUuZmlsdGVyTG9hZGluZyA/IHRoaXMuc3RhdGUuZmlsdGVyUG9zdHMgOiBbXTtcblxuICAgICAgICBjb25zdCBhZGRJY29uID0gPEljb24gaWNvbj1cInBsdXNcIiAvPjtcbiAgICAgICAgY29uc3QgcmVtb3ZlSWNvbiA9IDxJY29uIGljb249XCJtaW51c1wiIC8+O1xuXG4gICAgICAgIGNvbnN0IHNlYXJjaGlucHV0dW5pcXVlSWQgPSAnc2VhcmNoaW5wdXQtJyArIE1hdGgucmFuZG9tKCkudG9TdHJpbmcoMzYpLnN1YnN0cigyLCAxNik7XG5cbiAgICAgICAgcmV0dXJuIChcbiAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY29tcG9uZW50cy1iYXNlLWNvbnRyb2wgY29tcG9uZW50cy1wb3N0LXNlbGVjdG9yXCI+XG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjb21wb25lbnRzLWJhc2UtY29udHJvbF9fZmllbGQtLXNlbGVjdGVkXCI+XG4gICAgICAgICAgICAgICAgICAgIDxoMj57X18oJ1NlYXJjaCBQb3N0JywgJ3ZvZGktZXh0ZW5zaW9ucycpfTwvaDI+XG4gICAgICAgICAgICAgICAgICAgIDxJdGVtTGlzdFxuICAgICAgICAgICAgICAgICAgICAgICAgaXRlbXM9eyBbLi4udGhpcy5zdGF0ZS5zZWxlY3RlZFBvc3RzXSB9XG4gICAgICAgICAgICAgICAgICAgICAgICBsb2FkaW5nPXt0aGlzLnN0YXRlLmluaXRpYWxMb2FkaW5nfVxuICAgICAgICAgICAgICAgICAgICAgICAgYWN0aW9uPXt0aGlzLnJlbW92ZVBvc3R9XG4gICAgICAgICAgICAgICAgICAgICAgICBpY29uPXtyZW1vdmVJY29ufVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY29tcG9uZW50cy1iYXNlLWNvbnRyb2xfX2ZpZWxkXCI+XG4gICAgICAgICAgICAgICAgICAgIDxsYWJlbCBodG1sRm9yPXtzZWFyY2hpbnB1dHVuaXF1ZUlkfSBjbGFzc05hbWU9XCJjb21wb25lbnRzLWJhc2UtY29udHJvbF9fbGFiZWxcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgIDxJY29uIGljb249XCJzZWFyY2hcIiAvPlxuICAgICAgICAgICAgICAgICAgICA8L2xhYmVsPlxuICAgICAgICAgICAgICAgICAgICA8aW5wdXRcbiAgICAgICAgICAgICAgICAgICAgICAgIGNsYXNzTmFtZT1cImNvbXBvbmVudHMtdGV4dC1jb250cm9sX19pbnB1dFwiXG4gICAgICAgICAgICAgICAgICAgICAgICBpZD17c2VhcmNoaW5wdXR1bmlxdWVJZH1cbiAgICAgICAgICAgICAgICAgICAgICAgIHR5cGU9XCJzZWFyY2hcIlxuICAgICAgICAgICAgICAgICAgICAgICAgcGxhY2Vob2xkZXI9e19fKCdQbGVhc2UgZW50ZXIgeW91ciBzZWFyY2ggcXVlcnkuLi4nLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZT17dGhpcy5zdGF0ZS5maWx0ZXJ9XG4gICAgICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17dGhpcy5oYW5kbGVJbnB1dEZpbHRlckNoYW5nZX1cbiAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICAgICAgPEl0ZW1MaXN0XG4gICAgICAgICAgICAgICAgICAgICAgICBpdGVtcz17cG9zdExpc3R9XG4gICAgICAgICAgICAgICAgICAgICAgICBsb2FkaW5nPXt0aGlzLnN0YXRlLmluaXRpYWxMb2FkaW5nfHx0aGlzLnN0YXRlLmxvYWRpbmd8fHRoaXMuc3RhdGUuZmlsdGVyTG9hZGluZ31cbiAgICAgICAgICAgICAgICAgICAgICAgIGZpbHRlcmVkPXt0aGlzLnN0YXRlLmZpbHRlcmluZ31cbiAgICAgICAgICAgICAgICAgICAgICAgIGFjdGlvbj17dGhpcy5hZGRQb3N0fVxuICAgICAgICAgICAgICAgICAgICAgICAgaWNvbj17YWRkSWNvbn1cbiAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICApO1xuICAgIH1cbn0iLCJpbXBvcnQgeyBQb3N0U2VsZWN0b3IgfSBmcm9tICcuL1Bvc3RTZWxlY3Rvcic7XG5pbXBvcnQgeyBUZXJtU2VsZWN0b3IgfSBmcm9tICcuL1Rlcm1TZWxlY3Rvcic7XG5cbmNvbnN0IHsgX18gfSA9IHdwLmkxOG47XG5jb25zdCB7IENvbXBvbmVudCB9ID0gd3AuZWxlbWVudDtcbmNvbnN0IHsgUmFuZ2VDb250cm9sLCBTZWxlY3RDb250cm9sLCBDaGVja2JveENvbnRyb2wgfSA9IHdwLmNvbXBvbmVudHM7XG5jb25zdCB7IGFwcGx5RmlsdGVycyB9ID0gd3AuaG9va3M7XG5cbi8qKlxuICogU2hvcnRjb2RlQXR0cyBDb21wb25lbnRcbiAqL1xuZXhwb3J0IGNsYXNzIFNob3J0Y29kZUF0dHMgZXh0ZW5kcyBDb21wb25lbnQge1xuICAgIC8qKlxuICAgICAqIENvbnN0cnVjdG9yIGZvciBTaG9ydGNvZGVBdHRzIENvbXBvbmVudC5cbiAgICAgKiBTZXRzIHVwIHN0YXRlLCBhbmQgY3JlYXRlcyBiaW5kaW5ncyBmb3IgZnVuY3Rpb25zLlxuICAgICAqIEBwYXJhbSBvYmplY3QgcHJvcHMgLSBjdXJyZW50IGNvbXBvbmVudCBwcm9wZXJ0aWVzLlxuICAgICAqL1xuICAgIGNvbnN0cnVjdG9yKHByb3BzKSB7XG4gICAgICAgIHN1cGVyKC4uLmFyZ3VtZW50cyk7XG4gICAgICAgIHRoaXMucHJvcHMgPSBwcm9wcztcblxuICAgICAgICB0aGlzLm9uQ2hhbmdlTGltaXQgPSB0aGlzLm9uQ2hhbmdlTGltaXQuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZUNvbHVtbnMgPSB0aGlzLm9uQ2hhbmdlQ29sdW1ucy5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlT3JkZXJieSA9IHRoaXMub25DaGFuZ2VPcmRlcmJ5LmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VPcmRlciA9IHRoaXMub25DaGFuZ2VPcmRlci5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlSWRzID0gdGhpcy5vbkNoYW5nZUlkcy5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlQ2F0ZWdvcnkgPSB0aGlzLm9uQ2hhbmdlQ2F0ZWdvcnkuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZUdlbnJlID0gdGhpcy5vbkNoYW5nZUdlbnJlLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VUYWcgPSB0aGlzLm9uQ2hhbmdlVGFnLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VGZWF0dXJlZCA9IHRoaXMub25DaGFuZ2VGZWF0dXJlZC5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlVG9wUmF0ZWQgPSB0aGlzLm9uQ2hhbmdlVG9wUmF0ZWQuYmluZCh0aGlzKTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZUxpbWl0KCBuZXdMaW1pdCApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTaG9ydGNvZGVBdHRzKHtcbiAgICAgICAgICAgIGxpbWl0OiBuZXdMaW1pdFxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZUNvbHVtbnMoIG5ld0NvbHVtbnMgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2hvcnRjb2RlQXR0cyh7XG4gICAgICAgICAgICBjb2x1bW5zOiBuZXdDb2x1bW5zXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlT3JkZXJieSggbmV3T3JkZXJieSApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTaG9ydGNvZGVBdHRzKHtcbiAgICAgICAgICAgIG9yZGVyYnk6IG5ld09yZGVyYnlcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VPcmRlciggbmV3T3JkZXIgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2hvcnRjb2RlQXR0cyh7XG4gICAgICAgICAgICBvcmRlcjogbmV3T3JkZXJcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VJZHMoIG5ld0lkcyApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTaG9ydGNvZGVBdHRzKHtcbiAgICAgICAgICAgIGlkczogbmV3SWRzLmpvaW4oJywnKVxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZUNhdGVnb3J5KCBuZXdDYXRlZ29yeSApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTaG9ydGNvZGVBdHRzKHtcbiAgICAgICAgICAgIGNhdGVnb3J5OiBuZXdDYXRlZ29yeS5qb2luKCcsJylcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VHZW5yZSggbmV3R2VucmUgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2hvcnRjb2RlQXR0cyh7XG4gICAgICAgICAgICBnZW5yZTogbmV3R2VucmUuam9pbignLCcpXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlVGFnKCBuZXdUYWcgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2hvcnRjb2RlQXR0cyh7XG4gICAgICAgICAgICB0YWc6IG5ld1RhZy5qb2luKCcsJylcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VGZWF0dXJlZCggbmV3RmVhdHVyZWQgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2hvcnRjb2RlQXR0cyh7XG4gICAgICAgICAgICBmZWF0dXJlZDogbmV3RmVhdHVyZWRcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VUb3BSYXRlZCggbmV3VG9wUmF0ZWQgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2hvcnRjb2RlQXR0cyh7XG4gICAgICAgICAgICB0b3BfcmF0ZWQ6IG5ld1RvcFJhdGVkXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFJlbmRlcnMgdGhlIFNob3J0Y29kZUF0dHMgY29tcG9uZW50LlxuICAgICAqL1xuICAgIHJlbmRlcigpIHtcbiAgICAgICAgY29uc3QgeyBhdHRyaWJ1dGVzLCBwb3N0VHlwZSwgcG9zdFN0YXR1cywgY2F0VGF4b25vbXksIHRhZ1RheG9ub215LCBtaW5MaW1pdCA9IDEsIG1heExpbWl0ID0gMjAsIG1pbkNvbHVtbnMgPSAxLCBtYXhDb2x1bW5zID0gNiwgaGlkZUZpZWxkcyB9ID0gdGhpcy5wcm9wcztcbiAgICAgICAgY29uc3QgeyBsaW1pdCwgY29sdW1ucywgb3JkZXJieSwgb3JkZXIsIGlkcywgY2F0ZWdvcnksIGdlbnJlLCB0YWcsIGZlYXR1cmVkLCB0b3BfcmF0ZWQgfSA9IGF0dHJpYnV0ZXM7XG5cbiAgICAgICAgcmV0dXJuIChcbiAgICAgICAgICAgIDxkaXY+XG4gICAgICAgICAgICAgICAgeyAhKCBoaWRlRmllbGRzICYmIGhpZGVGaWVsZHMuaW5jbHVkZXMoJ2xpbWl0JykgKSA/IChcbiAgICAgICAgICAgICAgICA8UmFuZ2VDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnTGltaXQnLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgbGltaXQgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VMaW1pdCB9XG4gICAgICAgICAgICAgICAgICAgIG1pbj17IGFwcGx5RmlsdGVycyggJ3ZvZGkuY29tcG9uZW50LnNob3J0Y29kZUF0dHMubGltaXQubWluJywgbWluTGltaXQgKSB9XG4gICAgICAgICAgICAgICAgICAgIG1heD17IGFwcGx5RmlsdGVycyggJ3ZvZGkuY29tcG9uZW50LnNob3J0Y29kZUF0dHMubGltaXQubWF4JywgbWF4TGltaXQgKSB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICApIDogJycgfVxuICAgICAgICAgICAgICAgIHsgISggaGlkZUZpZWxkcyAmJiBoaWRlRmllbGRzLmluY2x1ZGVzKCdjb2x1bW5zJykgKSA/IChcbiAgICAgICAgICAgICAgICA8UmFuZ2VDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnQ29sdW1ucycsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBjb2x1bW5zIH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlQ29sdW1ucyB9XG4gICAgICAgICAgICAgICAgICAgIG1pbj17IGFwcGx5RmlsdGVycyggJ3ZvZGkuY29tcG9uZW50LnNob3J0Y29kZUF0dHMuY29sdW1ucy5taW4nLCBtaW5Db2x1bW5zICkgfVxuICAgICAgICAgICAgICAgICAgICBtYXg9eyBhcHBseUZpbHRlcnMoICd2b2RpLmNvbXBvbmVudC5zaG9ydGNvZGVBdHRzLmNvbHVtbnMubWF4JywgbWF4Q29sdW1ucyApIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICkgOiAnJyB9XG4gICAgICAgICAgICAgICAgeyAhKCBoaWRlRmllbGRzICYmIGhpZGVGaWVsZHMuaW5jbHVkZXMoJ29yZGVyYnknKSApID8gKFxuICAgICAgICAgICAgICAgIDxTZWxlY3RDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnT3JkZXJieScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBvcmRlcmJ5IH1cbiAgICAgICAgICAgICAgICAgICAgb3B0aW9ucz17IGFwcGx5RmlsdGVycyggJ3ZvZGkuY29tcG9uZW50LnNob3J0Y29kZUF0dHMub3JkZXJieS5vcHRpb25zJywgW1xuICAgICAgICAgICAgICAgICAgICAgICAgeyBsYWJlbDogX18oJ1RpdGxlJywgJ3ZvZGktZXh0ZW5zaW9ucycpLCB2YWx1ZTogJ3RpdGxlJyB9LFxuICAgICAgICAgICAgICAgICAgICAgICAgeyBsYWJlbDogX18oJ0RhdGUnLCAndm9kaS1leHRlbnNpb25zJyksIHZhbHVlOiAoIHBvc3RUeXBlID09PSAnbW92aWUnID8gJ3JlbGVhc2VfZGF0ZScgOiAnZGF0ZScgKSB9LFxuICAgICAgICAgICAgICAgICAgICAgICAgeyBsYWJlbDogX18oJ0lEJywgJ3ZvZGktZXh0ZW5zaW9ucycpLCB2YWx1ZTogJ2lkJyB9LFxuICAgICAgICAgICAgICAgICAgICAgICAgeyBsYWJlbDogX18oJ1JhbmRvbScsICd2b2RpLWV4dGVuc2lvbnMnKSwgdmFsdWU6ICdyYW5kJyB9LFxuICAgICAgICAgICAgICAgICAgICBdLCB0aGlzLnByb3BzICkgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VPcmRlcmJ5IH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICkgOiAnJyB9XG4gICAgICAgICAgICAgICAgeyAhKCBoaWRlRmllbGRzICYmIGhpZGVGaWVsZHMuaW5jbHVkZXMoJ29yZGVyJykgKSA/IChcbiAgICAgICAgICAgICAgICA8U2VsZWN0Q29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ09yZGVyJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IG9yZGVyIH1cbiAgICAgICAgICAgICAgICAgICAgb3B0aW9ucz17IGFwcGx5RmlsdGVycyggJ3ZvZGkuY29tcG9uZW50LnNob3J0Y29kZUF0dHMub3JkZXIub3B0aW9ucycsIFtcbiAgICAgICAgICAgICAgICAgICAgICAgIHsgbGFiZWw6IF9fKCdBU0MnLCAndm9kaS1leHRlbnNpb25zJyksIHZhbHVlOiAnQVNDJyB9LFxuICAgICAgICAgICAgICAgICAgICAgICAgeyBsYWJlbDogX18oJ0RFU0MnLCAndm9kaS1leHRlbnNpb25zJyksIHZhbHVlOiAnREVTQycgfSxcbiAgICAgICAgICAgICAgICAgICAgXSwgdGhpcy5wcm9wcyApIH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlT3JkZXIgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgKSA6ICcnIH1cbiAgICAgICAgICAgICAgICB7ICEoIGhpZGVGaWVsZHMgJiYgaGlkZUZpZWxkcy5pbmNsdWRlcygnaWRzJykgKSA/IChcbiAgICAgICAgICAgICAgICA8UG9zdFNlbGVjdG9yXG4gICAgICAgICAgICAgICAgICAgIHBvc3RUeXBlID0geyBwb3N0VHlwZSB9XG4gICAgICAgICAgICAgICAgICAgIHBvc3RTdGF0dXMgPSB7IHBvc3RTdGF0dXMgfVxuICAgICAgICAgICAgICAgICAgICBzZWxlY3RlZFBvc3RJZHM9eyBpZHMgPyBpZHMuc3BsaXQoJywnKS5tYXAoTnVtYmVyKSA6IFtdIH1cbiAgICAgICAgICAgICAgICAgICAgdXBkYXRlU2VsZWN0ZWRQb3N0SWRzPXsgdGhpcy5vbkNoYW5nZUlkcyB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICApIDogJycgfVxuICAgICAgICAgICAgICAgIHsgKCBwb3N0VHlwZSA9PT0gJ3ZpZGVvJyApICYmIGNhdFRheG9ub215ICYmICEoIGhpZGVGaWVsZHMgJiYgaGlkZUZpZWxkcy5pbmNsdWRlcygnY2F0ZWdvcnknKSApID8gKFxuICAgICAgICAgICAgICAgIDxUZXJtU2VsZWN0b3JcbiAgICAgICAgICAgICAgICAgICAgcG9zdFR5cGUgPSB7IHBvc3RUeXBlIH1cbiAgICAgICAgICAgICAgICAgICAgdGF4b25vbXkgPSB7IGNhdFRheG9ub215IH1cbiAgICAgICAgICAgICAgICAgICAgdGl0bGUgPSB7IF9fKCdTZWFyY2ggQ2F0ZWdvcnknLCAndm9kaS1leHRlbnNpb25zJykgfVxuICAgICAgICAgICAgICAgICAgICBzZWxlY3RlZFRlcm1JZHM9eyBjYXRlZ29yeSA/IGNhdGVnb3J5LnNwbGl0KCcsJykubWFwKE51bWJlcikgOiBbXSB9XG4gICAgICAgICAgICAgICAgICAgIHVwZGF0ZVNlbGVjdGVkVGVybUlkcz17IHRoaXMub25DaGFuZ2VDYXRlZ29yeSB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICApIDogKCBjYXRUYXhvbm9teSAmJiAhKCBoaWRlRmllbGRzICYmIGhpZGVGaWVsZHMuaW5jbHVkZXMoJ2dlbnJlJykgKSA/IChcbiAgICAgICAgICAgICAgICA8VGVybVNlbGVjdG9yXG4gICAgICAgICAgICAgICAgICAgIHBvc3RUeXBlID0geyBwb3N0VHlwZSB9XG4gICAgICAgICAgICAgICAgICAgIHRheG9ub215ID0geyBjYXRUYXhvbm9teSB9XG4gICAgICAgICAgICAgICAgICAgIHRpdGxlID0geyBfXygnU2VhcmNoIEdlbnJlJywgJ3ZvZGktZXh0ZW5zaW9ucycpIH1cbiAgICAgICAgICAgICAgICAgICAgc2VsZWN0ZWRUZXJtSWRzPXsgZ2VucmUgPyBnZW5yZS5zcGxpdCgnLCcpLm1hcChOdW1iZXIpIDogW10gfVxuICAgICAgICAgICAgICAgICAgICB1cGRhdGVTZWxlY3RlZFRlcm1JZHM9eyB0aGlzLm9uQ2hhbmdlR2VucmUgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgKSA6ICcnICkgfVxuICAgICAgICAgICAgICAgIHsgISggaGlkZUZpZWxkcyAmJiBoaWRlRmllbGRzLmluY2x1ZGVzKCd0YWcnKSApID8gKFxuICAgICAgICAgICAgICAgIDxUZXJtU2VsZWN0b3JcbiAgICAgICAgICAgICAgICAgICAgcG9zdFR5cGUgPSB7IHBvc3RUeXBlIH1cbiAgICAgICAgICAgICAgICAgICAgdGF4b25vbXkgPSB7IHRhZ1RheG9ub215IH1cbiAgICAgICAgICAgICAgICAgICAgdGl0bGUgPSB7IF9fKCdTZWFyY2ggVGFnJywgJ3ZvZGktZXh0ZW5zaW9ucycpIH1cbiAgICAgICAgICAgICAgICAgICAgc2VsZWN0ZWRUZXJtSWRzPXsgdGFnID8gdGFnLnNwbGl0KCcsJykubWFwKE51bWJlcikgOiBbXSB9XG4gICAgICAgICAgICAgICAgICAgIHVwZGF0ZVNlbGVjdGVkVGVybUlkcz17IHRoaXMub25DaGFuZ2VUYWcgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgKSA6ICcnIH1cbiAgICAgICAgICAgICAgICB7ICEoIGhpZGVGaWVsZHMgJiYgaGlkZUZpZWxkcy5pbmNsdWRlcygnZmVhdHVyZWQnKSApID8gKFxuICAgICAgICAgICAgICAgIDxDaGVja2JveENvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdGZWF0dXJlZCcsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgaGVscD17X18oJ0NoZWNrIHRvIHNlbGVjdCBmZWF0dXJlZCBwb3N0cy4nLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIGNoZWNrZWQ9eyBmZWF0dXJlZCB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZUZlYXR1cmVkIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICkgOiAnJyB9XG4gICAgICAgICAgICAgICAgeyAhKCBoaWRlRmllbGRzICYmIGhpZGVGaWVsZHMuaW5jbHVkZXMoJ3RvcF9yYXRlZCcpICkgPyAoXG4gICAgICAgICAgICAgICAgPENoZWNrYm94Q29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ1RvcCBSYXRlZCcsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgaGVscD17X18oJ0NoZWNrIHRvIHNlbGVjdCB0b3AgcmF0ZWQgcG9zdHMuJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICBjaGVja2VkPXsgdG9wX3JhdGVkIH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlVG9wUmF0ZWQgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgKSA6ICcnIH1cbiAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICApO1xuICAgIH1cbn0iLCJpbXBvcnQgeyBJdGVtTGlzdCB9IGZyb20gXCIuL0l0ZW1MaXN0XCI7XG5pbXBvcnQgKiBhcyBhcGkgZnJvbSAnLi4vdXRpbHMvYXBpJztcbmltcG9ydCB7IHVuaXF1ZUJ5SWQsIGRlYm91bmNlIH0gZnJvbSAnLi4vdXRpbHMvdXNlZnVsLWZ1bmNzJztcblxuY29uc3QgeyBfXyB9ID0gd3AuaTE4bjtcbmNvbnN0IHsgSWNvbiB9ID0gd3AuY29tcG9uZW50cztcbmNvbnN0IHsgQ29tcG9uZW50IH0gPSB3cC5lbGVtZW50O1xuXG4vKipcbiAqIFRlcm1TZWxlY3RvciBDb21wb25lbnRcbiAqL1xuZXhwb3J0IGNsYXNzIFRlcm1TZWxlY3RvciBleHRlbmRzIENvbXBvbmVudCB7XG4gICAgLyoqXG4gICAgICogQ29uc3RydWN0b3IgZm9yIFRlcm1TZWxlY3RvciBDb21wb25lbnQuXG4gICAgICogU2V0cyB1cCBzdGF0ZSwgYW5kIGNyZWF0ZXMgYmluZGluZ3MgZm9yIGZ1bmN0aW9ucy5cbiAgICAgKiBAcGFyYW0gb2JqZWN0IHByb3BzIC0gY3VycmVudCBjb21wb25lbnQgcHJvcGVydGllcy5cbiAgICAgKi9cbiAgICBjb25zdHJ1Y3Rvcihwcm9wcykge1xuICAgICAgICBzdXBlciguLi5hcmd1bWVudHMpO1xuICAgICAgICB0aGlzLnByb3BzID0gcHJvcHM7XG5cbiAgICAgICAgdGhpcy5zdGF0ZSA9IHtcbiAgICAgICAgICAgIHRlcm1zOiBbXSxcbiAgICAgICAgICAgIGxvYWRpbmc6IGZhbHNlLFxuICAgICAgICAgICAgdHlwZTogcHJvcHMucG9zdFR5cGUgfHwgJ3Bvc3QnLFxuICAgICAgICAgICAgdGF4b25vbXk6IHByb3BzLnRheG9ub215IHx8ICdjYXRlZ29yeScsXG4gICAgICAgICAgICB0YXhvbm9taWVzOiBbXSxcbiAgICAgICAgICAgIGZpbHRlcjogJycsXG4gICAgICAgICAgICBmaWx0ZXJMb2FkaW5nOiBmYWxzZSxcbiAgICAgICAgICAgIGZpbHRlclRlcm1zOiBbXSxcbiAgICAgICAgICAgIGluaXRpYWxMb2FkaW5nOiBmYWxzZSxcbiAgICAgICAgfTtcblxuICAgICAgICB0aGlzLmFkZFRlcm0gPSB0aGlzLmFkZFRlcm0uYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5yZW1vdmVUZXJtID0gdGhpcy5yZW1vdmVUZXJtLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMuaGFuZGxlSW5wdXRGaWx0ZXJDaGFuZ2UgPSB0aGlzLmhhbmRsZUlucHV0RmlsdGVyQ2hhbmdlLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMuZG9UZXJtRmlsdGVyID0gZGVib3VuY2UodGhpcy5kb1Rlcm1GaWx0ZXIuYmluZCh0aGlzKSwgMzAwKTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBXaGVuIHRoZSBjb21wb25lbnQgbW91bnRzIGl0IGNhbGxzIHRoaXMgZnVuY3Rpb24uXG4gICAgICogRmV0Y2hlcyB0ZXJtcyB0YXhvbm9taWVzLCBzZWxlY3RlZCB0ZXJtcyB0aGVuIG1ha2VzIGZpcnN0IGNhbGwgZm9yIHRlcm1zXG4gICAgICovXG4gICAgY29tcG9uZW50RGlkTW91bnQoKSB7XG4gICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgaW5pdGlhbExvYWRpbmc6IHRydWUsXG4gICAgICAgIH0pO1xuXG4gICAgICAgIGFwaS5nZXRUYXhvbm9taWVzKCB7IHR5cGU6IHRoaXMuc3RhdGUudHlwZSB9IClcbiAgICAgICAgICAgIC50aGVuKCggcmVzcG9uc2UgKSA9PiB7XG4gICAgICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgICAgIHRheG9ub21pZXM6IHJlc3BvbnNlXG4gICAgICAgICAgICAgICAgfSwgKCkgPT4ge1xuICAgICAgICAgICAgICAgICAgICB0aGlzLnJldHJpZXZlU2VsZWN0ZWRUZXJtcygpXG4gICAgICAgICAgICAgICAgICAgICAgICAudGhlbigoKSA9PiB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGluaXRpYWxMb2FkaW5nOiBmYWxzZSxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBHZXRUZXJtcyB3cmFwcGVyLCBidWlsZHMgdGhlIHJlcXVlc3QgYXJndW1lbnQgYmFzZWQgc3RhdGUgYW5kIHBhcmFtZXRlcnMgcGFzc2VkL1xuICAgICAqIEBwYXJhbSB7b2JqZWN0fSBhcmdzIC0gZGVzaXJlZCBhcmd1bWVudHMgKGNhbiBiZSBlbXB0eSkuXG4gICAgICogQHJldHVybnMge1Byb21pc2U8VD59XG4gICAgICovXG4gICAgZ2V0VGVybXMoYXJncyA9IHt9KSB7XG4gICAgICAgIGNvbnN0IHsgc2VsZWN0ZWRUZXJtSWRzIH0gPSB0aGlzLnByb3BzO1xuXG4gICAgICAgIGNvbnN0IGRlZmF1bHRBcmdzID0ge1xuICAgICAgICAgICAgcGVyX3BhZ2U6IDEwLFxuICAgICAgICAgICAgdHlwZTogdGhpcy5zdGF0ZS50eXBlLFxuICAgICAgICAgICAgdGF4b25vbXk6IHRoaXMuc3RhdGUudGF4b25vbXksXG4gICAgICAgICAgICBzZWFyY2g6IHRoaXMuc3RhdGUuZmlsdGVyLFxuICAgICAgICB9O1xuXG4gICAgICAgIGNvbnN0IHJlcXVlc3RBcmd1bWVudHMgPSB7XG4gICAgICAgICAgICAuLi5kZWZhdWx0QXJncyxcbiAgICAgICAgICAgIC4uLmFyZ3NcbiAgICAgICAgfTtcblxuICAgICAgICByZXF1ZXN0QXJndW1lbnRzLnJlc3RCYXNlID0gdGhpcy5zdGF0ZS50YXhvbm9taWVzW3RoaXMuc3RhdGUudGF4b25vbXldLnJlc3RfYmFzZTtcblxuICAgICAgICByZXR1cm4gYXBpLmdldFRlcm1zKHJlcXVlc3RBcmd1bWVudHMpXG4gICAgICAgICAgICAudGhlbihyZXNwb25zZSA9PiB7XG4gICAgICAgICAgICAgICAgaWYgKHJlcXVlc3RBcmd1bWVudHMuc2VhcmNoKSB7XG4gICAgICAgICAgICAgICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgICAgICAgICAgICAgZmlsdGVyVGVybXM6IHJlc3BvbnNlLmZpbHRlcigoeyBpZCB9KSA9PiBzZWxlY3RlZFRlcm1JZHMuaW5kZXhPZihpZCkgPT09IC0xKSxcbiAgICAgICAgICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIHJlc3BvbnNlO1xuICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgICAgICAgICB0ZXJtczogdW5pcXVlQnlJZChbLi4udGhpcy5zdGF0ZS50ZXJtcywgLi4ucmVzcG9uc2VdKSxcbiAgICAgICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgICAgIC8vIHJldHVybiByZXNwb25zZSB0byBjb250aW51ZSB0aGUgY2hhaW5cbiAgICAgICAgICAgICAgICByZXR1cm4gcmVzcG9uc2U7XG4gICAgICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBHZXRzIHRoZSBzZWxlY3RlZCB0ZXJtcyBieSBpZCBmcm9tIHRoZSBgdGVybXNgIHN0YXRlIG9iamVjdCBhbmQgc29ydHMgdGhlbSBieSB0aGVpciBwb3NpdGlvbiBpbiB0aGUgc2VsZWN0ZWQgYXJyYXkuXG4gICAgICogQHJldHVybnMgQXJyYXkgb2Ygb2JqZWN0cy5cbiAgICAgKi9cbiAgICBnZXRTZWxlY3RlZFRlcm1zKCkge1xuICAgICAgICBjb25zdCB7IHNlbGVjdGVkVGVybUlkcyB9ID0gdGhpcy5wcm9wcztcbiAgICAgICAgcmV0dXJuIHRoaXMuc3RhdGUudGVybXNcbiAgICAgICAgICAgIC5maWx0ZXIoKHsgaWQgfSkgPT4gc2VsZWN0ZWRUZXJtSWRzLmluZGV4T2YoaWQpICE9PSAtMSlcbiAgICAgICAgICAgIC5zb3J0KChhLCBiKSA9PiB7XG4gICAgICAgICAgICAgICAgY29uc3QgYUluZGV4ID0gdGhpcy5wcm9wcy5zZWxlY3RlZFRlcm1JZHMuaW5kZXhPZihhLmlkKTtcbiAgICAgICAgICAgICAgICBjb25zdCBiSW5kZXggPSB0aGlzLnByb3BzLnNlbGVjdGVkVGVybUlkcy5pbmRleE9mKGIuaWQpO1xuXG4gICAgICAgICAgICAgICAgaWYgKGFJbmRleCA+IGJJbmRleCkge1xuICAgICAgICAgICAgICAgICAgICByZXR1cm4gMTtcbiAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICBpZiAoYUluZGV4IDwgYkluZGV4KSB7XG4gICAgICAgICAgICAgICAgICAgIHJldHVybiAtMTtcbiAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICByZXR1cm4gMDtcbiAgICAgICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIE1ha2VzIHRoZSBuZWNlc3NhcnkgYXBpIGNhbGxzIHRvIGZldGNoIHRoZSBzZWxlY3RlZCB0ZXJtcyBhbmQgcmV0dXJucyBhIHByb21pc2UuXG4gICAgICogQHJldHVybnMgeyp9XG4gICAgICovXG4gICAgcmV0cmlldmVTZWxlY3RlZFRlcm1zKCkge1xuICAgICAgICBjb25zdCB7IHRlcm1UeXBlLCBzZWxlY3RlZFRlcm1JZHMgfSA9IHRoaXMucHJvcHM7XG4gICAgICAgIGNvbnN0IHsgdGF4b25vbWllcyB9ID0gdGhpcy5zdGF0ZTtcblxuICAgICAgICBpZiAoIHNlbGVjdGVkVGVybUlkcyAmJiAhc2VsZWN0ZWRUZXJtSWRzLmxlbmd0aCA+IDAgKSB7XG4gICAgICAgICAgICAvLyByZXR1cm4gYSBmYWtlIHByb21pc2UgdGhhdCBhdXRvIHJlc29sdmVzLlxuICAgICAgICAgICAgcmV0dXJuIG5ldyBQcm9taXNlKChyZXNvbHZlKSA9PiByZXNvbHZlKCkpO1xuICAgICAgICB9XG5cbiAgICAgICAgcmV0dXJuIHRoaXMuZ2V0VGVybXMoe1xuICAgICAgICAgICAgaW5jbHVkZTogdGhpcy5wcm9wcy5zZWxlY3RlZFRlcm1JZHMuam9pbignLCcpLFxuICAgICAgICAgICAgcGVyX3BhZ2U6IDEwMCxcbiAgICAgICAgICAgIHRlcm1UeXBlXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEFkZHMgZGVzaXJlZCB0ZXJtIGlkIHRvIHRoZSBzZWxlY3RlZFRlcm1JZHMgTGlzdFxuICAgICAqIEBwYXJhbSB7SW50ZWdlcn0gdGVybV9pZFxuICAgICAqL1xuICAgIGFkZFRlcm0odGVybV9pZCkge1xuICAgICAgICBpZiAodGhpcy5zdGF0ZS5maWx0ZXIpIHtcbiAgICAgICAgICAgIGNvbnN0IHRlcm0gPSB0aGlzLnN0YXRlLmZpbHRlclRlcm1zLmZpbHRlcihwID0+IHAuaWQgPT09IHRlcm1faWQpO1xuICAgICAgICAgICAgY29uc3QgdGVybXMgPSB1bmlxdWVCeUlkKFtcbiAgICAgICAgICAgICAgICAuLi50aGlzLnN0YXRlLnRlcm1zLFxuICAgICAgICAgICAgICAgIC4uLnRlcm1cbiAgICAgICAgICAgIF0pO1xuXG4gICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICB0ZXJtc1xuICAgICAgICAgICAgfSk7XG4gICAgICAgIH1cblxuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZVNlbGVjdGVkVGVybUlkcyhbXG4gICAgICAgICAgICAuLi50aGlzLnByb3BzLnNlbGVjdGVkVGVybUlkcyxcbiAgICAgICAgICAgIHRlcm1faWRcbiAgICAgICAgXSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogUmVtb3ZlcyBkZXNpcmVkIHRlcm0gaWQgdG8gdGhlIHNlbGVjdGVkVGVybUlkcyBMaXN0XG4gICAgICogQHBhcmFtIHtJbnRlZ2VyfSB0ZXJtX2lkXG4gICAgICovXG4gICAgcmVtb3ZlVGVybSh0ZXJtX2lkKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2VsZWN0ZWRUZXJtSWRzKFtcbiAgICAgICAgICAgIC4uLnRoaXMucHJvcHMuc2VsZWN0ZWRUZXJtSWRzXG4gICAgICAgIF0uZmlsdGVyKGlkID0+IGlkICE9PSB0ZXJtX2lkKSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogSGFuZGxlcyB0aGUgc2VhcmNoIGJveCBpbnB1dCB2YWx1ZVxuICAgICAqIEBwYXJhbSBzdHJpbmcgdHlwZSAtIGNvbWVzIGZyb20gdGhlIGV2ZW50IG9iamVjdCB0YXJnZXQuXG4gICAgICovXG4gICAgaGFuZGxlSW5wdXRGaWx0ZXJDaGFuZ2UoeyB0YXJnZXQ6IHsgdmFsdWU6ZmlsdGVyID0gJycgfSA9IHt9IH0gPSB7fSkge1xuICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgIGZpbHRlclxuICAgICAgICB9LCAoKSA9PiB7XG4gICAgICAgICAgICBpZiAoIWZpbHRlcikge1xuICAgICAgICAgICAgICAgIC8vIHJlbW92ZSBmaWx0ZXJlZCB0ZXJtc1xuICAgICAgICAgICAgICAgIHJldHVybiB0aGlzLnNldFN0YXRlKHsgZmlsdGVyZWRUZXJtczogW10sIGZpbHRlcmluZzogZmFsc2UgfSk7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIHRoaXMuZG9UZXJtRmlsdGVyKCk7XG4gICAgICAgIH0pXG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogQWN0dWFsIGFwaSBjYWxsIGZvciBzZWFyY2hpbmcgZm9yIHF1ZXJ5LCB0aGlzIGZ1bmN0aW9uIGlzIGRlYm91bmNlZCBpbiBjb25zdHJ1Y3Rvci5cbiAgICAgKi9cbiAgICBkb1Rlcm1GaWx0ZXIoKSB7XG4gICAgICAgIGNvbnN0IHsgZmlsdGVyID0gJycgfSA9IHRoaXMuc3RhdGU7XG5cbiAgICAgICAgaWYgKCFmaWx0ZXIpIHtcbiAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuXG4gICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgZmlsdGVyaW5nOiB0cnVlLFxuICAgICAgICAgICAgZmlsdGVyTG9hZGluZzogdHJ1ZVxuICAgICAgICB9KTtcblxuICAgICAgICB0aGlzLmdldFRlcm1zKClcbiAgICAgICAgICAgIC50aGVuKCgpID0+IHtcbiAgICAgICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICAgICAgZmlsdGVyTG9hZGluZzogZmFsc2VcbiAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFJlbmRlcnMgdGhlIFRlcm1TZWxlY3RvciBjb21wb25lbnQuXG4gICAgICovXG4gICAgcmVuZGVyKCkge1xuICAgICAgICBjb25zdCB7IHRpdGxlID0gX18oJ1NlYXJjaCBUZXJtJywgJ3ZvZGknKSB9ID0gdGhpcy5wcm9wcztcbiAgICAgICAgY29uc3QgaXNGaWx0ZXJlZCA9IHRoaXMuc3RhdGUuZmlsdGVyaW5nO1xuICAgICAgICBjb25zdCB0ZXJtTGlzdCA9IGlzRmlsdGVyZWQgJiYgIXRoaXMuc3RhdGUuZmlsdGVyTG9hZGluZyA/IHRoaXMuc3RhdGUuZmlsdGVyVGVybXMgOiBbXTtcbiAgICAgICAgY29uc3QgU2VsZWN0ZWRUZXJtTGlzdCAgPSB0aGlzLmdldFNlbGVjdGVkVGVybXMoKTtcblxuICAgICAgICBjb25zdCBhZGRJY29uID0gPEljb24gaWNvbj1cInBsdXNcIiAvPjtcbiAgICAgICAgY29uc3QgcmVtb3ZlSWNvbiA9IDxJY29uIGljb249XCJtaW51c1wiIC8+O1xuXG4gICAgICAgIGNvbnN0IHNlYXJjaGlucHV0dW5pcXVlSWQgPSAnc2VhcmNoaW5wdXQtJyArIE1hdGgucmFuZG9tKCkudG9TdHJpbmcoMzYpLnN1YnN0cigyLCAxNik7XG5cbiAgICAgICAgcmV0dXJuIChcbiAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY29tcG9uZW50cy1iYXNlLWNvbnRyb2wgY29tcG9uZW50cy10ZXJtLXNlbGVjdG9yXCI+XG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjb21wb25lbnRzLWJhc2UtY29udHJvbF9fZmllbGQtLXNlbGVjdGVkXCI+XG4gICAgICAgICAgICAgICAgICAgIDxoMj57IHRpdGxlIH08L2gyPlxuICAgICAgICAgICAgICAgICAgICA8SXRlbUxpc3RcbiAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW1zPXtTZWxlY3RlZFRlcm1MaXN0fVxuICAgICAgICAgICAgICAgICAgICAgICAgbG9hZGluZz17dGhpcy5zdGF0ZS5pbml0aWFsTG9hZGluZ31cbiAgICAgICAgICAgICAgICAgICAgICAgIGFjdGlvbj17dGhpcy5yZW1vdmVUZXJtfVxuICAgICAgICAgICAgICAgICAgICAgICAgaWNvbj17cmVtb3ZlSWNvbn1cbiAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sX19maWVsZFwiPlxuICAgICAgICAgICAgICAgICAgICA8bGFiZWwgaHRtbEZvcj17c2VhcmNoaW5wdXR1bmlxdWVJZH0gY2xhc3NOYW1lPVwiY29tcG9uZW50cy1iYXNlLWNvbnRyb2xfX2xhYmVsXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICA8SWNvbiBpY29uPVwic2VhcmNoXCIgLz5cbiAgICAgICAgICAgICAgICAgICAgPC9sYWJlbD5cbiAgICAgICAgICAgICAgICAgICAgPGlucHV0XG4gICAgICAgICAgICAgICAgICAgICAgICBjbGFzc05hbWU9XCJjb21wb25lbnRzLXRleHQtY29udHJvbF9faW5wdXRcIlxuICAgICAgICAgICAgICAgICAgICAgICAgaWQ9e3NlYXJjaGlucHV0dW5pcXVlSWR9XG4gICAgICAgICAgICAgICAgICAgICAgICB0eXBlPVwic2VhcmNoXCJcbiAgICAgICAgICAgICAgICAgICAgICAgIHBsYWNlaG9sZGVyPXtfXygnUGxlYXNlIGVudGVyIHlvdXIgc2VhcmNoIHF1ZXJ5Li4uJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9e3RoaXMuc3RhdGUuZmlsdGVyfVxuICAgICAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9e3RoaXMuaGFuZGxlSW5wdXRGaWx0ZXJDaGFuZ2V9XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgIDxJdGVtTGlzdFxuICAgICAgICAgICAgICAgICAgICAgICAgaXRlbXM9e3Rlcm1MaXN0fVxuICAgICAgICAgICAgICAgICAgICAgICAgbG9hZGluZz17dGhpcy5zdGF0ZS5pbml0aWFsTG9hZGluZ3x8dGhpcy5zdGF0ZS5sb2FkaW5nfHx0aGlzLnN0YXRlLmZpbHRlckxvYWRpbmd9XG4gICAgICAgICAgICAgICAgICAgICAgICBmaWx0ZXJlZD17aXNGaWx0ZXJlZH1cbiAgICAgICAgICAgICAgICAgICAgICAgIGFjdGlvbj17dGhpcy5hZGRUZXJtfVxuICAgICAgICAgICAgICAgICAgICAgICAgaWNvbj17YWRkSWNvbn1cbiAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICApO1xuICAgIH1cbn0iLCJjb25zdCB7IGFwaUZldGNoIH0gPSB3cDtcblxuLyoqXG4gKiBNYWtlcyBhIGdldCByZXF1ZXN0IHRvIHRoZSBQb3N0VHlwZXMgZW5kcG9pbnQuXG4gKlxuICogQHJldHVybnMge1Byb21pc2U8YW55Pn1cbiAqL1xuZXhwb3J0IGNvbnN0IGdldFBvc3RUeXBlcyA9ICgpID0+IHtcbiAgICByZXR1cm4gYXBpRmV0Y2goIHsgcGF0aDogJy93cC92Mi90eXBlcycgfSApO1xufTtcblxuLyoqXG4gKiBNYWtlcyBhIGdldCByZXF1ZXN0IHRvIHRoZSBkZXNpcmVkIHBvc3QgdHlwZSBhbmQgYnVpbGRzIHRoZSBxdWVyeSBzdHJpbmcgYmFzZWQgb24gYW4gb2JqZWN0LlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfGJvb2xlYW59IHJlc3RCYXNlIC0gcmVzdCBiYXNlIGZvciB0aGUgcXVlcnkuXG4gKiBAcGFyYW0ge29iamVjdH0gYXJnc1xuICogQHJldHVybnMge1Byb21pc2U8YW55Pn1cbiAqL1xuZXhwb3J0IGNvbnN0IGdldFBvc3RzID0gKHsgcmVzdEJhc2UgPSBmYWxzZSwgLi4uYXJncyB9KSA9PiB7XG4gICAgY29uc3QgcXVlcnlTdHJpbmcgPSBPYmplY3Qua2V5cyhhcmdzKS5tYXAoYXJnID0+IGAke2FyZ309JHthcmdzW2FyZ119YCkuam9pbignJicpO1xuXG4gICAgbGV0IHBhdGggPSBgL3dwL3YyLyR7cmVzdEJhc2V9PyR7cXVlcnlTdHJpbmd9Jl9lbWJlZGA7XG4gICAgcmV0dXJuIGFwaUZldGNoKCB7IHBhdGg6IHBhdGggfSApO1xufTtcblxuLyoqXG4gKiBNYWtlcyBhIGdldCByZXF1ZXN0IHRvIHRoZSBQb3N0VHlwZSBUYXhvbm9taWVzIGVuZHBvaW50LlxuICpcbiAqIEByZXR1cm5zIHtQcm9taXNlPGFueT59XG4gKi9cbmV4cG9ydCBjb25zdCBnZXRUYXhvbm9taWVzID0gKHsgLi4uYXJncyB9KSA9PiB7XG4gICAgY29uc3QgcXVlcnlTdHJpbmcgPSBPYmplY3Qua2V5cyhhcmdzKS5tYXAoYXJnID0+IGAke2FyZ309JHthcmdzW2FyZ119YCkuam9pbignJicpO1xuXG4gICAgbGV0IHBhdGggPSBgL3dwL3YyL3RheG9ub21pZXM/JHtxdWVyeVN0cmluZ30mX2VtYmVkYDtcbiAgICByZXR1cm4gYXBpRmV0Y2goIHsgcGF0aDogcGF0aCB9ICk7XG59O1xuXG4vKipcbiAqIE1ha2VzIGEgZ2V0IHJlcXVlc3QgdG8gdGhlIGRlc2lyZWQgcG9zdCB0eXBlIGFuZCBidWlsZHMgdGhlIHF1ZXJ5IHN0cmluZyBiYXNlZCBvbiBhbiBvYmplY3QuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd8Ym9vbGVhbn0gcmVzdEJhc2UgLSByZXN0IGJhc2UgZm9yIHRoZSBxdWVyeS5cbiAqIEBwYXJhbSB7b2JqZWN0fSBhcmdzXG4gKiBAcmV0dXJucyB7UHJvbWlzZTxhbnk+fVxuICovXG5leHBvcnQgY29uc3QgZ2V0VGVybXMgPSAoeyByZXN0QmFzZSA9IGZhbHNlLCAuLi5hcmdzIH0pID0+IHtcbiAgICBjb25zdCBxdWVyeVN0cmluZyA9IE9iamVjdC5rZXlzKGFyZ3MpLm1hcChhcmcgPT4gYCR7YXJnfT0ke2FyZ3NbYXJnXX1gKS5qb2luKCcmJyk7XG5cbiAgICBsZXQgcGF0aCA9IGAvd3AvdjIvJHtyZXN0QmFzZX0/JHtxdWVyeVN0cmluZ30mX2VtYmVkYDtcbiAgICByZXR1cm4gYXBpRmV0Y2goIHsgcGF0aDogcGF0aCB9ICk7XG59OyIsIi8qKlxuICogUmV0dXJucyBhIHVuaXF1ZSBhcnJheSBvZiBvYmplY3RzIGJhc2VkIG9uIGEgZGVzaXJlZCBrZXkuXG4gKiBAcGFyYW0ge2FycmF5fSBhcnIgLSBhcnJheSBvZiBvYmplY3RzLlxuICogQHBhcmFtIHtzdHJpbmd8aW50fSBrZXkgLSBrZXkgdG8gZmlsdGVyIG9iamVjdHMgYnlcbiAqL1xuZXhwb3J0IGNvbnN0IHVuaXF1ZUJ5ID0gKGFyciwga2V5KSA9PiB7XG4gICAgbGV0IGtleXMgPSBbXTtcbiAgICByZXR1cm4gYXJyLmZpbHRlcihpdGVtID0+IHtcbiAgICAgICAgaWYgKGtleXMuaW5kZXhPZihpdGVtW2tleV0pICE9PSAtMSkge1xuICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgICAgICB9XG5cbiAgICAgICAgcmV0dXJuIGtleXMucHVzaChpdGVtW2tleV0pO1xuICAgIH0pO1xufTtcblxuLyoqXG4gKiBSZXR1cm5zIGEgdW5pcXVlIGFycmF5IG9mIG9iamVjdHMgYmFzZWQgb24gdGhlIGlkIHByb3BlcnR5LlxuICogQHBhcmFtIHthcnJheX0gYXJyIC0gYXJyYXkgb2Ygb2JqZWN0cyB0byBmaWx0ZXIuXG4gKiBAcmV0dXJucyB7Kn1cbiAqL1xuZXhwb3J0IGNvbnN0IHVuaXF1ZUJ5SWQgPSBhcnIgPT4gdW5pcXVlQnkoYXJyLCAnaWQnKTtcblxuLyoqXG4gKiBEZWJvdW5jZSBhIGZ1bmN0aW9uIGJ5IGxpbWl0aW5nIGhvdyBvZnRlbiBpdCBjYW4gcnVuLlxuICogQHBhcmFtIHtmdW5jdGlvbn0gZnVuYyAtIGNhbGxiYWNrIGZ1bmN0aW9uXG4gKiBAcGFyYW0ge0ludGVnZXJ9IHdhaXQgLSBUaW1lIGluIG1pbGxpc2Vjb25kcyBob3cgbG9uZyBpdCBzaG91bGQgd2FpdC5cbiAqIEByZXR1cm5zIHtGdW5jdGlvbn1cbiAqL1xuZXhwb3J0IGNvbnN0IGRlYm91bmNlID0gKGZ1bmMsIHdhaXQpID0+IHtcbiAgICBsZXQgdGltZW91dCA9IG51bGw7XG5cbiAgICByZXR1cm4gZnVuY3Rpb24gKCkge1xuICAgICAgICBjb25zdCBjb250ZXh0ID0gdGhpcztcbiAgICAgICAgY29uc3QgYXJncyA9IGFyZ3VtZW50cztcblxuICAgICAgICBjb25zdCBsYXRlciA9ICgpID0+IHtcbiAgICAgICAgICAgIGZ1bmMuYXBwbHkoY29udGV4dCwgYXJncyk7XG4gICAgICAgIH07XG5cbiAgICAgICAgY2xlYXJUaW1lb3V0KHRpbWVvdXQpO1xuICAgICAgICB0aW1lb3V0ID0gc2V0VGltZW91dChsYXRlciwgd2FpdCk7XG4gICAgfVxufTsiXX0=
