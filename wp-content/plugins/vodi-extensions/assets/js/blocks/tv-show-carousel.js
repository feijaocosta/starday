(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

var _ShortcodeAtts = require("../components/ShortcodeAtts");

var _CarouselArgs = require("../components/CarouselArgs");

var _DesignOptions = require("../components/DesignOptions");

var _Repeater = require("../components/Repeater");

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
registerBlockType('vodi/tv-show-carousel', {
  title: __('TV Shows Carousel Block', 'vodi-extensions'),
  icon: 'welcome-view-site',
  category: 'vodi-blocks',
  edit: props => {
    const {
      attributes,
      setAttributes
    } = props;
    const {
      section_title,
      section_nav_links,
      shortcode_atts,
      carousel_args,
      design_options
    } = attributes;

    const onChangeSectionTitle = newSectionTitle => {
      setAttributes({
        section_title: newSectionTitle
      });
    };

    const onChangeSectionNavLinks = newSectionNavLinks => {
      setAttributes({
        section_nav_links: JSON.stringify([...newSectionNavLinks])
      });
    };

    const onChangeSectionNavLinksText = (newSectionNavLinksText, index) => {
      var section_nav_links_updated = JSON.parse(section_nav_links);
      section_nav_links_updated[index].title = newSectionNavLinksText;
      setAttributes({
        section_nav_links: JSON.stringify([...section_nav_links_updated])
      });
    };

    const onChangeSectionNavLinksLink = (newSectionNavLinksLink, index) => {
      var section_nav_links_updated = JSON.parse(section_nav_links);
      section_nav_links_updated[index].link = newSectionNavLinksLink;
      setAttributes({
        section_nav_links: JSON.stringify([...section_nav_links_updated])
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
    }), wp.element.createElement(_Repeater.Repeater, {
      title: __('Nav Links', 'vodi-extensions'),
      values: section_nav_links ? JSON.parse(section_nav_links) : [],
      defaultValues: {
        title: '',
        link: ''
      },
      updateValues: onChangeSectionNavLinks
    }, wp.element.createElement(TextControl, {
      label: __('Action Text', 'vodi-extensions'),
      name: "title",
      valuekey: "value",
      value: "",
      trigger_method_name: "onChange",
      onChange: onChangeSectionNavLinksText
    }), wp.element.createElement(TextControl, {
      label: __('Action Link', 'vodi-extensions'),
      name: "link",
      valuekey: "value",
      value: "",
      trigger_method_name: "onChange",
      onChange: onChangeSectionNavLinksLink
    })), wp.element.createElement(PanelBody, {
      title: __('TV Show Attributes', 'vodi-extensions'),
      initialOpen: true
    }, wp.element.createElement(_ShortcodeAtts.ShortcodeAtts, {
      postType: "tv_show",
      catTaxonomy: "tv_show_genre",
      tagTaxonomy: "tv_show_tag",
      hideFields: ['columns'],
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
      block: "vodi/tv-show-carousel",
      attributes: attributes
    })));
  },

  save() {
    // Rendering in PHP
    return null;
  }

});

},{"../components/CarouselArgs":2,"../components/DesignOptions":3,"../components/Repeater":7,"../components/ShortcodeAtts":8}],2:[function(require,module,exports){
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

},{"../utils/api":10,"../utils/useful-funcs":11,"./ItemList":5}],7:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.Repeater = void 0;
const {
  __
} = wp.i18n;
const {
  Component,
  Children
} = wp.element;
const {
  Panel,
  Button,
  Icon
} = wp.components;
/**
 * Repeater Component
 */

class Repeater extends Component {
  /**
   * Constructor for Repeater Component.
   * Sets up state, and creates bindings for functions.
   * @param object props - current component properties.
   */
  constructor(props) {
    super(...arguments);
    this.props = props;
    this.renderAddButton = this.renderAddButton.bind(this);
    this.renderRemoveButton = this.renderRemoveButton.bind(this);
    this.handleAdd = this.handleAdd.bind(this);
    this.handleRemove = this.handleRemove.bind(this);
    this.renderChildrenElements = this.renderChildrenElements.bind(this);
  }

  renderAddButton() {
    return wp.element.createElement(Button, {
      isDefault: true,
      className: "button-fullwidth",
      onClick: this.handleAdd
    }, wp.element.createElement(Icon, {
      icon: "plus"
    }));
  }

  renderRemoveButton() {
    return wp.element.createElement(Button, {
      isDestructive: true,
      className: "button-remove",
      onClick: this.handleRemove
    }, wp.element.createElement(Icon, {
      icon: "dismiss"
    }));
  }

  handleAdd() {
    const {
      defaultValues,
      updateValues
    } = this.props;
    const {
      values
    } = this.props;
    const current_values = values ? [...values, { ...defaultValues
    }] : [{ ...defaultValues
    }];
    updateValues(current_values);
  }

  handleRemove(index) {
    const {
      updateValues
    } = this.props;
    const {
      values
    } = this.props;
    const current_values = values.filter((value, i) => i != index);
    updateValues(current_values);
  }

  renderChildrenElements() {
    const {
      children
    } = this.props;
    const {
      values
    } = this.props;

    if (!values) {
      return [];
    }

    const remove_button = this.renderRemoveButton();
    return values.map((value, index) => {
      const updated_children = Children.map(children, child => {
        let child_props = { ...child.props
        };

        if (values[index][child.props.name]) {
          child_props[child.props.valuekey] = values[index][child.props.name];
        }

        child_props[child.props.trigger_method_name] = value => child.props[child.props.trigger_method_name](value, index);

        return React.cloneElement(child, { ...child_props
        });
      });
      const updated_remove_button = React.cloneElement(remove_button, {
        key: 'repeater-remove-' + index,
        onClick: () => remove_button.props['onClick'](index)
      });
      return React.createElement(Panel, {
        key: 'repeater-child-' + index
      }, [updated_children, updated_remove_button]);
    });
  }
  /**
   * Renders the Repeater component.
   */


  render() {
    return wp.element.createElement("div", {
      className: "components-base-control repeater-component"
    }, wp.element.createElement("div", {
      className: "components-base-control__field"
    }, wp.element.createElement("label", {
      className: "components-base-control__label"
    }, this.props.title), this.renderChildrenElements(), this.renderAddButton()));
  }

}

exports.Repeater = Repeater;

},{}],8:[function(require,module,exports){
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

},{"./PostSelector":6,"./TermSelector":9}],9:[function(require,module,exports){
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

},{"../utils/api":10,"../utils/useful-funcs":11,"./ItemList":5}],10:[function(require,module,exports){
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

},{}],11:[function(require,module,exports){
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9ibG9ja3MvdHYtc2hvdy1jYXJvdXNlbC5qcyIsInNyYy9wbHVnaW5zL3ZvZGktZXh0ZW5zaW9ucy9hc3NldHMvZXNuZXh0L2NvbXBvbmVudHMvQ2Fyb3VzZWxBcmdzLmpzIiwic3JjL3BsdWdpbnMvdm9kaS1leHRlbnNpb25zL2Fzc2V0cy9lc25leHQvY29tcG9uZW50cy9EZXNpZ25PcHRpb25zLmpzIiwic3JjL3BsdWdpbnMvdm9kaS1leHRlbnNpb25zL2Fzc2V0cy9lc25leHQvY29tcG9uZW50cy9JdGVtLmpzIiwic3JjL3BsdWdpbnMvdm9kaS1leHRlbnNpb25zL2Fzc2V0cy9lc25leHQvY29tcG9uZW50cy9JdGVtTGlzdC5qcyIsInNyYy9wbHVnaW5zL3ZvZGktZXh0ZW5zaW9ucy9hc3NldHMvZXNuZXh0L2NvbXBvbmVudHMvUG9zdFNlbGVjdG9yLmpzIiwic3JjL3BsdWdpbnMvdm9kaS1leHRlbnNpb25zL2Fzc2V0cy9lc25leHQvY29tcG9uZW50cy9SZXBlYXRlci5qcyIsInNyYy9wbHVnaW5zL3ZvZGktZXh0ZW5zaW9ucy9hc3NldHMvZXNuZXh0L2NvbXBvbmVudHMvU2hvcnRjb2RlQXR0cy5qcyIsInNyYy9wbHVnaW5zL3ZvZGktZXh0ZW5zaW9ucy9hc3NldHMvZXNuZXh0L2NvbXBvbmVudHMvVGVybVNlbGVjdG9yLmpzIiwic3JjL3BsdWdpbnMvdm9kaS1leHRlbnNpb25zL2Fzc2V0cy9lc25leHQvdXRpbHMvYXBpLmpzIiwic3JjL3BsdWdpbnMvdm9kaS1leHRlbnNpb25zL2Fzc2V0cy9lc25leHQvdXRpbHMvdXNlZnVsLWZ1bmNzLmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBOzs7QUNBQTs7QUFDQTs7QUFDQTs7QUFDQTs7QUFFQSxNQUFNO0FBQUUsRUFBQTtBQUFGLElBQVMsRUFB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QUFPLElBQVAsS0FBZ0I7QUFDcEMsTUFBSSxPQUFPLEdBQUcsSUFBZDtBQUVBLFNBQU8sWUFBWTtBQUNmLFVBQU0sT0FBTyxHQUFHLElBQWhCO0FBQ0EsVUFBTSxJQUFJLEdBQUcsU0FBYjs7QUFFQSxVQUFNLEtBQUssR0FBRyxNQUFNO0FBQ2hCLE1BQUEsSUFBSSxDQUFDLEtBQUwsQ0FBVyxPQUFYLEVBQW9CLElBQXBCO0FBQ0gsS0FGRDs7QUFJQSxJQUFBLFlBQVksQ0FBQyxPQUFELENBQVo7QUFDQSxJQUFBLE9BQU8sR0FBRyxVQUFVLENBQUMsS0FBRCxFQUFRLElBQVIsQ0FBcEI7QUFDSCxHQVZEO0FBV0gsQ0FkTSIsImZpbGUiOiJnZW5lcmF0ZWQuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uKCl7ZnVuY3Rpb24gcihlLG4sdCl7ZnVuY3Rpb24gbyhpLGYpe2lmKCFuW2ldKXtpZighZVtpXSl7dmFyIGM9XCJmdW5jdGlvblwiPT10eXBlb2YgcmVxdWlyZSYmcmVxdWlyZTtpZighZiYmYylyZXR1cm4gYyhpLCEwKTtpZih1KXJldHVybiB1KGksITApO3ZhciBhPW5ldyBFcnJvcihcIkNhbm5vdCBmaW5kIG1vZHVsZSAnXCIraStcIidcIik7dGhyb3cgYS5jb2RlPVwiTU9EVUxFX05PVF9GT1VORFwiLGF9dmFyIHA9bltpXT17ZXhwb3J0czp7fX07ZVtpXVswXS5jYWxsKHAuZXhwb3J0cyxmdW5jdGlvbihyKXt2YXIgbj1lW2ldWzFdW3JdO3JldHVybiBvKG58fHIpfSxwLHAuZXhwb3J0cyxyLGUsbix0KX1yZXR1cm4gbltpXS5leHBvcnRzfWZvcih2YXIgdT1cImZ1bmN0aW9uXCI9PXR5cGVvZiByZXF1aXJlJiZyZXF1aXJlLGk9MDtpPHQubGVuZ3RoO2krKylvKHRbaV0pO3JldHVybiBvfXJldHVybiByfSkoKSIsImltcG9ydCB7IFNob3J0Y29kZUF0dHMgfSBmcm9tICcuLi9jb21wb25lbnRzL1Nob3J0Y29kZUF0dHMnO1xuaW1wb3J0IHsgQ2Fyb3VzZWxBcmdzIH0gZnJvbSAnLi4vY29tcG9uZW50cy9DYXJvdXNlbEFyZ3MnO1xuaW1wb3J0IHsgRGVzaWduT3B0aW9ucyB9IGZyb20gJy4uL2NvbXBvbmVudHMvRGVzaWduT3B0aW9ucyc7XG5pbXBvcnQgeyBSZXBlYXRlciB9IGZyb20gJy4uL2NvbXBvbmVudHMvUmVwZWF0ZXInO1xuXG5jb25zdCB7IF9fIH0gPSB3cC5pMThuO1xuY29uc3QgeyByZWdpc3RlckJsb2NrVHlwZSB9ID0gd3AuYmxvY2tzO1xuY29uc3QgeyBJbnNwZWN0b3JDb250cm9scyB9ID0gd3AuZWRpdG9yO1xuY29uc3QgeyBGcmFnbWVudCB9ID0gd3AuZWxlbWVudDtcbmNvbnN0IHsgU2VydmVyU2lkZVJlbmRlciwgRGlzYWJsZWQsIFBhbmVsQm9keSwgVGV4dENvbnRyb2wsIFNlbGVjdENvbnRyb2wgfSA9IHdwLmNvbXBvbmVudHM7XG5cbnJlZ2lzdGVyQmxvY2tUeXBlKCAndm9kaS90di1zaG93LWNhcm91c2VsJywge1xuICAgIHRpdGxlOiBfXygnVFYgU2hvd3MgQ2Fyb3VzZWwgQmxvY2snLCAndm9kaS1leHRlbnNpb25zJyksXG5cbiAgICBpY29uOiAnd2VsY29tZS12aWV3LXNpdGUnLFxuXG4gICAgY2F0ZWdvcnk6ICd2b2RpLWJsb2NrcycsXG5cbiAgICBlZGl0OiAoICggcHJvcHMgKSA9PiB7XG4gICAgICAgIGNvbnN0IHsgYXR0cmlidXRlcywgc2V0QXR0cmlidXRlcyB9ID0gcHJvcHM7XG4gICAgICAgIGNvbnN0IHsgc2VjdGlvbl90aXRsZSwgc2VjdGlvbl9uYXZfbGlua3MsIHNob3J0Y29kZV9hdHRzLCBjYXJvdXNlbF9hcmdzLCBkZXNpZ25fb3B0aW9ucyB9ID0gYXR0cmlidXRlcztcblxuICAgICAgICBjb25zdCBvbkNoYW5nZVNlY3Rpb25UaXRsZSA9IG5ld1NlY3Rpb25UaXRsZSA9PiB7XG4gICAgICAgICAgICBzZXRBdHRyaWJ1dGVzKCB7IHNlY3Rpb25fdGl0bGU6IG5ld1NlY3Rpb25UaXRsZSB9ICk7XG4gICAgICAgIH07XG5cbiAgICAgICAgY29uc3Qgb25DaGFuZ2VTZWN0aW9uTmF2TGlua3MgPSBuZXdTZWN0aW9uTmF2TGlua3MgPT4ge1xuICAgICAgICAgICAgc2V0QXR0cmlidXRlcyggeyBzZWN0aW9uX25hdl9saW5rczogSlNPTi5zdHJpbmdpZnkoWy4uLm5ld1NlY3Rpb25OYXZMaW5rc10pIH0gKTtcbiAgICAgICAgfTtcblxuICAgICAgICBjb25zdCBvbkNoYW5nZVNlY3Rpb25OYXZMaW5rc1RleHQgPSAobmV3U2VjdGlvbk5hdkxpbmtzVGV4dCwgaW5kZXgpID0+IHtcbiAgICAgICAgICAgIHZhciBzZWN0aW9uX25hdl9saW5rc191cGRhdGVkID0gSlNPTi5wYXJzZShzZWN0aW9uX25hdl9saW5rcyk7XG4gICAgICAgICAgICBzZWN0aW9uX25hdl9saW5rc191cGRhdGVkW2luZGV4XS50aXRsZSA9IG5ld1NlY3Rpb25OYXZMaW5rc1RleHQ7XG4gICAgICAgICAgICBzZXRBdHRyaWJ1dGVzKCB7IHNlY3Rpb25fbmF2X2xpbmtzOiBKU09OLnN0cmluZ2lmeShbLi4uc2VjdGlvbl9uYXZfbGlua3NfdXBkYXRlZF0pIH0gKTtcbiAgICAgICAgfTtcblxuICAgICAgICBjb25zdCBvbkNoYW5nZVNlY3Rpb25OYXZMaW5rc0xpbmsgPSAobmV3U2VjdGlvbk5hdkxpbmtzTGluaywgaW5kZXgpID0+IHtcbiAgICAgICAgICAgIHZhciBzZWN0aW9uX25hdl9saW5rc191cGRhdGVkID0gSlNPTi5wYXJzZShzZWN0aW9uX25hdl9saW5rcyk7XG4gICAgICAgICAgICBzZWN0aW9uX25hdl9saW5rc191cGRhdGVkW2luZGV4XS5saW5rID0gbmV3U2VjdGlvbk5hdkxpbmtzTGluaztcbiAgICAgICAgICAgIHNldEF0dHJpYnV0ZXMoIHsgc2VjdGlvbl9uYXZfbGlua3M6IEpTT04uc3RyaW5naWZ5KFsuLi5zZWN0aW9uX25hdl9saW5rc191cGRhdGVkXSkgfSApO1xuICAgICAgICB9O1xuXG4gICAgICAgIGNvbnN0IG9uQ2hhbmdlU2hvcnRjb2RlQXR0cyA9IG5ld1Nob3J0Y29kZUF0dHMgPT4ge1xuICAgICAgICAgICAgc2V0QXR0cmlidXRlcyggeyBzaG9ydGNvZGVfYXR0czogeyAuLi5zaG9ydGNvZGVfYXR0cywgLi4ubmV3U2hvcnRjb2RlQXR0cyB9IH0gKTtcbiAgICAgICAgfTtcblxuICAgICAgICBjb25zdCBvbkNoYW5nZUNhcm91c2VsQXJncyA9IG5ld0Nhcm91c2VsQXJncyA9PiB7XG4gICAgICAgICAgICBzZXRBdHRyaWJ1dGVzKCB7IGNhcm91c2VsX2FyZ3M6IHsgLi4uY2Fyb3VzZWxfYXJncywgLi4ubmV3Q2Fyb3VzZWxBcmdzIH0gfSApO1xuICAgICAgICB9O1xuXG4gICAgICAgIGNvbnN0IG9uQ2hhbmdlRGVzaWduT3B0aW9ucyA9IG5ld0Rlc2lnbk9wdGlvbnMgPT4ge1xuICAgICAgICAgICAgc2V0QXR0cmlidXRlcyggeyBkZXNpZ25fb3B0aW9uczogeyAuLi5kZXNpZ25fb3B0aW9ucywgLi4ubmV3RGVzaWduT3B0aW9ucyB9IH0gKTtcbiAgICAgICAgfTtcblxuICAgICAgICByZXR1cm4gKFxuICAgICAgICAgICAgPEZyYWdtZW50PlxuICAgICAgICAgICAgICAgIDxJbnNwZWN0b3JDb250cm9scz5cbiAgICAgICAgICAgICAgICAgICAgPFRleHRDb250cm9sXG4gICAgICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ1NlY3Rpb24gVGl0bGUnLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IHNlY3Rpb25fdGl0bGUgfVxuICAgICAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyBvbkNoYW5nZVNlY3Rpb25UaXRsZSB9XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgIDxSZXBlYXRlclxuICAgICAgICAgICAgICAgICAgICAgICAgdGl0bGU9e19fKCdOYXYgTGlua3MnLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZXM9eyBzZWN0aW9uX25hdl9saW5rcyA/IEpTT04ucGFyc2Uoc2VjdGlvbl9uYXZfbGlua3MpIDogW10gfVxuICAgICAgICAgICAgICAgICAgICAgICAgZGVmYXVsdFZhbHVlcz17IHsgdGl0bGU6ICcnLCBsaW5rOiAnJyB9IH1cbiAgICAgICAgICAgICAgICAgICAgICAgIHVwZGF0ZVZhbHVlcz17IG9uQ2hhbmdlU2VjdGlvbk5hdkxpbmtzIH1cbiAgICAgICAgICAgICAgICAgICAgPlxuICAgICAgICAgICAgICAgICAgICAgICAgPFRleHRDb250cm9sXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdBY3Rpb24gVGV4dCcsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBuYW1lPSd0aXRsZSdcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZWtleT0ndmFsdWUnXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9JydcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0cmlnZ2VyX21ldGhvZF9uYW1lPSdvbkNoYW5nZSdcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IG9uQ2hhbmdlU2VjdGlvbk5hdkxpbmtzVGV4dCB9XG4gICAgICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICAgICAgPFRleHRDb250cm9sXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdBY3Rpb24gTGluaycsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBuYW1lPSdsaW5rJ1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVla2V5PSd2YWx1ZSdcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZT0nJ1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRyaWdnZXJfbWV0aG9kX25hbWU9J29uQ2hhbmdlJ1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgb25DaGFuZ2VTZWN0aW9uTmF2TGlua3NMaW5rIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgIDwvUmVwZWF0ZXI+XG4gICAgICAgICAgICAgICAgICAgIDxQYW5lbEJvZHlcbiAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlPXtfXygnVFYgU2hvdyBBdHRyaWJ1dGVzJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgaW5pdGlhbE9wZW49eyB0cnVlIH1cbiAgICAgICAgICAgICAgICAgICAgPlxuICAgICAgICAgICAgICAgICAgICAgICAgPFNob3J0Y29kZUF0dHNcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBwb3N0VHlwZSA9ICd0dl9zaG93J1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNhdFRheG9ub215ID0gJ3R2X3Nob3dfZ2VucmUnXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGFnVGF4b25vbXkgPSAndHZfc2hvd190YWcnXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaGlkZUZpZWxkcyA9IHsgWydjb2x1bW5zJ10gfVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGF0dHJpYnV0ZXMgPSB7IHsgLi4uc2hvcnRjb2RlX2F0dHMgfSB9XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdXBkYXRlU2hvcnRjb2RlQXR0cyA9IHsgb25DaGFuZ2VTaG9ydGNvZGVBdHRzIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgIDwvUGFuZWxCb2R5PlxuICAgICAgICAgICAgICAgICAgICA8UGFuZWxCb2R5XG4gICAgICAgICAgICAgICAgICAgICAgICB0aXRsZT17X18oJ0Nhcm91c2VsIEFyZ3MnLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgICAgICBpbml0aWFsT3Blbj17IHRydWUgfVxuICAgICAgICAgICAgICAgICAgICA+XG4gICAgICAgICAgICAgICAgICAgICAgICA8Q2Fyb3VzZWxBcmdzXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYXR0cmlidXRlcyA9IHsgeyAuLi5jYXJvdXNlbF9hcmdzIH0gfVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHVwZGF0ZUNhcm91c2VsQXJncyA9IHsgb25DaGFuZ2VDYXJvdXNlbEFyZ3MgfVxuICAgICAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICAgICAgPC9QYW5lbEJvZHk+XG4gICAgICAgICAgICAgICAgICAgIDxQYW5lbEJvZHlcbiAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlPXtfXygnRGVzaWduIE9wdGlvbnMnLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgICAgICBpbml0aWFsT3Blbj17IGZhbHNlIH1cbiAgICAgICAgICAgICAgICAgICAgPlxuICAgICAgICAgICAgICAgICAgICAgICAgPERlc2lnbk9wdGlvbnNcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBhdHRyaWJ1dGVzID0geyB7IC4uLmRlc2lnbl9vcHRpb25zIH0gfVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHVwZGF0ZURlc2lnbk9wdGlvbnMgPSB7IG9uQ2hhbmdlRGVzaWduT3B0aW9ucyB9XG4gICAgICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICA8L1BhbmVsQm9keT5cbiAgICAgICAgICAgICAgICA8L0luc3BlY3RvckNvbnRyb2xzPlxuICAgICAgICAgICAgICAgIDxEaXNhYmxlZD5cbiAgICAgICAgICAgICAgICAgICAgPFNlcnZlclNpZGVSZW5kZXJcbiAgICAgICAgICAgICAgICAgICAgICAgIGJsb2NrPVwidm9kaS90di1zaG93LWNhcm91c2VsXCJcbiAgICAgICAgICAgICAgICAgICAgICAgIGF0dHJpYnV0ZXM9eyBhdHRyaWJ1dGVzIH1cbiAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8L0Rpc2FibGVkPlxuICAgICAgICAgICAgPC9GcmFnbWVudD5cbiAgICAgICAgKTtcbiAgICB9ICksXG5cbiAgICBzYXZlKCkge1xuICAgICAgICAvLyBSZW5kZXJpbmcgaW4gUEhQXG4gICAgICAgIHJldHVybiBudWxsO1xuICAgIH0sXG59ICk7IiwiY29uc3QgeyBfXyB9ID0gd3AuaTE4bjtcbmNvbnN0IHsgQ29tcG9uZW50IH0gPSB3cC5lbGVtZW50O1xuY29uc3QgeyBSYW5nZUNvbnRyb2wsIENoZWNrYm94Q29udHJvbCB9ID0gd3AuY29tcG9uZW50cztcblxuLyoqXG4gKiBDYXJvdXNlbEFyZ3MgQ29tcG9uZW50XG4gKi9cbmV4cG9ydCBjbGFzcyBDYXJvdXNlbEFyZ3MgZXh0ZW5kcyBDb21wb25lbnQge1xuICAgIC8qKlxuICAgICAqIENvbnN0cnVjdG9yIGZvciBDYXJvdXNlbEFyZ3MgQ29tcG9uZW50LlxuICAgICAqIFNldHMgdXAgc3RhdGUsIGFuZCBjcmVhdGVzIGJpbmRpbmdzIGZvciBmdW5jdGlvbnMuXG4gICAgICogQHBhcmFtIG9iamVjdCBwcm9wcyAtIGN1cnJlbnQgY29tcG9uZW50IHByb3BlcnRpZXMuXG4gICAgICovXG4gICAgY29uc3RydWN0b3IocHJvcHMpIHtcbiAgICAgICAgc3VwZXIoLi4uYXJndW1lbnRzKTtcbiAgICAgICAgdGhpcy5wcm9wcyA9IHByb3BzO1xuXG4gICAgICAgIHRoaXMub25DaGFuZ2VTbGlkZXNUb1Nob3cgPSB0aGlzLm9uQ2hhbmdlU2xpZGVzVG9TaG93LmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VTbGlkZXNUb1Njcm9sbCA9IHRoaXMub25DaGFuZ2VTbGlkZXNUb1Njcm9sbC5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlRG90cyA9IHRoaXMub25DaGFuZ2VEb3RzLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VBcnJvd3MgPSB0aGlzLm9uQ2hhbmdlQXJyb3dzLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VBdXRvcGxheSA9IHRoaXMub25DaGFuZ2VBdXRvcGxheS5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlSW5maW5pdGUgPSB0aGlzLm9uQ2hhbmdlSW5maW5pdGUuYmluZCh0aGlzKTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZVNsaWRlc1RvU2hvdyggbmV3U2xpZGVzVG9TaG93ICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZUNhcm91c2VsQXJncyh7XG4gICAgICAgICAgICBzbGlkZXNUb1Nob3c6IG5ld1NsaWRlc1RvU2hvd1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZVNsaWRlc1RvU2Nyb2xsKCBuZXdTbGlkZXNUb1Njcm9sbCApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVDYXJvdXNlbEFyZ3Moe1xuICAgICAgICAgICAgc2xpZGVzVG9TY3JvbGw6IG5ld1NsaWRlc1RvU2Nyb2xsXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlRG90cyggbmV3RG90cyApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVDYXJvdXNlbEFyZ3Moe1xuICAgICAgICAgICAgZG90czogbmV3RG90c1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZUFycm93cyggbmV3QXJyb3dzICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZUNhcm91c2VsQXJncyh7XG4gICAgICAgICAgICBhcnJvd3M6IG5ld0Fycm93c1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZUF1dG9wbGF5KCBuZXdBdXRvcGxheSApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVDYXJvdXNlbEFyZ3Moe1xuICAgICAgICAgICAgYXV0b3BsYXk6IG5ld0F1dG9wbGF5XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlSW5maW5pdGUoIG5ld0luZmluaXRlICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZUNhcm91c2VsQXJncyh7XG4gICAgICAgICAgICBpbmZpbml0ZTogbmV3SW5maW5pdGVcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogUmVuZGVycyB0aGUgQ2Fyb3VzZWxBcmdzIGNvbXBvbmVudC5cbiAgICAgKi9cbiAgICByZW5kZXIoKSB7XG4gICAgICAgIGNvbnN0IHsgYXR0cmlidXRlcyB9ID0gdGhpcy5wcm9wcztcbiAgICAgICAgY29uc3QgeyBzbGlkZXNUb1Nob3csIHNsaWRlc1RvU2Nyb2xsLCBkb3RzLCBhcnJvd3MsIGF1dG9wbGF5LCBpbmZpbml0ZSB9ID0gYXR0cmlidXRlcztcblxuICAgICAgICByZXR1cm4gKFxuICAgICAgICAgICAgPGRpdj5cbiAgICAgICAgICAgICAgICA8UmFuZ2VDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnU2xpZGUgVG8gU2hvdycsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBzbGlkZXNUb1Nob3cgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VTbGlkZXNUb1Nob3cgfVxuICAgICAgICAgICAgICAgICAgICBtaW49eyAxIH1cbiAgICAgICAgICAgICAgICAgICAgbWF4PXsgOCB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8UmFuZ2VDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnU2xpZGVzIFRvIFNjcm9sbCcsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBzbGlkZXNUb1Njcm9sbCB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZVNsaWRlc1RvU2Nyb2xsIH1cbiAgICAgICAgICAgICAgICAgICAgbWluPXsgMSB9XG4gICAgICAgICAgICAgICAgICAgIG1heD17IDggfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPENoZWNrYm94Q29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ0RvdHMnLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIGhlbHA9e19fKCdDaGVjayB0byBzaG93IGNhcm91c2VsIGRvdHMuJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICBjaGVja2VkPXsgZG90cyB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZURvdHMgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPENoZWNrYm94Q29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ0Fycm93cycsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgaGVscD17X18oJ0NoZWNrIHRvIHNob3cgY2Fyb3VzZWwgYXJyb3dzLicsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgY2hlY2tlZD17IGFycm93cyB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZUFycm93cyB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8Q2hlY2tib3hDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnQXV0b3BsYXknLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIGhlbHA9e19fKCdDaGVjayB0byBhdXRvcGxheSBjYXJvdXNlbC4nLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIGNoZWNrZWQ9eyBhdXRvcGxheSB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZUF1dG9wbGF5IH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDxDaGVja2JveENvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdJbmZpbml0ZSBTY3JvbGwnLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIGhlbHA9e19fKCdDaGVjayB0byBpbmZpbml0ZSBzY3JvbGwgY2Fyb3VzZWwuJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICBjaGVja2VkPXsgaW5maW5pdGUgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VJbmZpbml0ZSB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICApO1xuICAgIH1cbn0iLCJjb25zdCB7IF9fIH0gPSB3cC5pMThuO1xuY29uc3QgeyBDb21wb25lbnQgfSA9IHdwLmVsZW1lbnQ7XG5jb25zdCB7IFJhbmdlQ29udHJvbCB9ID0gd3AuY29tcG9uZW50cztcblxuLyoqXG4gKiBEZXNpZ25PcHRpb25zIENvbXBvbmVudFxuICovXG5leHBvcnQgY2xhc3MgRGVzaWduT3B0aW9ucyBleHRlbmRzIENvbXBvbmVudCB7XG4gICAgLyoqXG4gICAgICogQ29uc3RydWN0b3IgZm9yIERlc2lnbk9wdGlvbnMgQ29tcG9uZW50LlxuICAgICAqIFNldHMgdXAgc3RhdGUsIGFuZCBjcmVhdGVzIGJpbmRpbmdzIGZvciBmdW5jdGlvbnMuXG4gICAgICogQHBhcmFtIG9iamVjdCBwcm9wcyAtIGN1cnJlbnQgY29tcG9uZW50IHByb3BlcnRpZXMuXG4gICAgICovXG4gICAgY29uc3RydWN0b3IocHJvcHMpIHtcbiAgICAgICAgc3VwZXIoLi4uYXJndW1lbnRzKTtcbiAgICAgICAgdGhpcy5wcm9wcyA9IHByb3BzO1xuXG4gICAgICAgIHRoaXMub25DaGFuZ2VQYWRkaW5nVG9wID0gdGhpcy5vbkNoYW5nZVBhZGRpbmdUb3AuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZVBhZGRpbmdCb3R0b20gPSB0aGlzLm9uQ2hhbmdlUGFkZGluZ0JvdHRvbS5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlUGFkZGluZ0xlZnQgPSB0aGlzLm9uQ2hhbmdlUGFkZGluZ0xlZnQuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZVBhZGRpbmdSaWdodCA9IHRoaXMub25DaGFuZ2VQYWRkaW5nUmlnaHQuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZU1hcmdpblRvcCA9IHRoaXMub25DaGFuZ2VNYXJnaW5Ub3AuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZU1hcmdpbkJvdHRvbSA9IHRoaXMub25DaGFuZ2VNYXJnaW5Cb3R0b20uYmluZCh0aGlzKTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZVBhZGRpbmdUb3AoIG5ld29uQ2hhbmdlUGFkZGluZ1RvcCApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVEZXNpZ25PcHRpb25zKHtcbiAgICAgICAgICAgIHBhZGRpbmdfdG9wOiBuZXdvbkNoYW5nZVBhZGRpbmdUb3BcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VQYWRkaW5nQm90dG9tKCBuZXdvbkNoYW5nZVBhZGRpbmdCb3R0b20gKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlRGVzaWduT3B0aW9ucyh7XG4gICAgICAgICAgICBwYWRkaW5nX2JvdHRvbTogbmV3b25DaGFuZ2VQYWRkaW5nQm90dG9tXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlUGFkZGluZ0xlZnQoIG5ld29uQ2hhbmdlUGFkZGluZ0xlZnQgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlRGVzaWduT3B0aW9ucyh7XG4gICAgICAgICAgICBwYWRkaW5nX2xlZnQ6IG5ld29uQ2hhbmdlUGFkZGluZ0xlZnRcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VQYWRkaW5nUmlnaHQoIG5ld29uQ2hhbmdlUGFkZGluZ1JpZ2h0ICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZURlc2lnbk9wdGlvbnMoe1xuICAgICAgICAgICAgcGFkZGluZ19yaWdodDogbmV3b25DaGFuZ2VQYWRkaW5nUmlnaHRcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VNYXJnaW5Ub3AoIG5ld29uQ2hhbmdlTWFyZ2luVG9wICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZURlc2lnbk9wdGlvbnMoe1xuICAgICAgICAgICAgbWFyZ2luX3RvcDogbmV3b25DaGFuZ2VNYXJnaW5Ub3BcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VNYXJnaW5Cb3R0b20oIG5ld29uQ2hhbmdlTWFyZ2luQm90dG9tICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZURlc2lnbk9wdGlvbnMoe1xuICAgICAgICAgICAgbWFyZ2luX2JvdHRvbTogbmV3b25DaGFuZ2VNYXJnaW5Cb3R0b21cbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogUmVuZGVycyB0aGUgRGVzaWduT3B0aW9ucyBjb21wb25lbnQuXG4gICAgICovXG4gICAgcmVuZGVyKCkge1xuICAgICAgICBjb25zdCB7IGF0dHJpYnV0ZXMgfSA9IHRoaXMucHJvcHM7XG4gICAgICAgIGNvbnN0IHsgcGFkZGluZ190b3AsIHBhZGRpbmdfYm90dG9tLCBwYWRkaW5nX2xlZnQsIHBhZGRpbmdfcmlnaHQsIG1hcmdpbl90b3AsIG1hcmdpbl9ib3R0b20gfSA9IGF0dHJpYnV0ZXM7XG5cbiAgICAgICAgcmV0dXJuIChcbiAgICAgICAgICAgIDxkaXY+XG4gICAgICAgICAgICAgICAgPFJhbmdlQ29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ1BhZGRpbmcgVG9wIChweCknLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgcGFkZGluZ190b3AgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VQYWRkaW5nVG9wIH1cbiAgICAgICAgICAgICAgICAgICAgbWluPXsgMCB9XG4gICAgICAgICAgICAgICAgICAgIG1heD17IDEwMCB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8UmFuZ2VDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnUGFkZGluZyBCb3R0b20gKHB4KScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBwYWRkaW5nX2JvdHRvbSB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZVBhZGRpbmdCb3R0b20gfVxuICAgICAgICAgICAgICAgICAgICBtaW49eyAwIH1cbiAgICAgICAgICAgICAgICAgICAgbWF4PXsgMTAwIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDxSYW5nZUNvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdQYWRkaW5nIExlZnQgKHB4KScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBwYWRkaW5nX2xlZnQgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VQYWRkaW5nTGVmdCB9XG4gICAgICAgICAgICAgICAgICAgIG1pbj17IDAgfVxuICAgICAgICAgICAgICAgICAgICBtYXg9eyAxMDAgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPFJhbmdlQ29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ1BhZGRpbmcgUmlnaHQgKHB4KScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBwYWRkaW5nX3JpZ2h0IH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlUGFkZGluZ1JpZ2h0IH1cbiAgICAgICAgICAgICAgICAgICAgbWluPXsgMCB9XG4gICAgICAgICAgICAgICAgICAgIG1heD17IDEwMCB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8UmFuZ2VDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnTWFyZ2luIFRvcCAocHgpJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IG1hcmdpbl90b3AgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VNYXJnaW5Ub3AgfVxuICAgICAgICAgICAgICAgICAgICBtaW49eyAtMTAwIH1cbiAgICAgICAgICAgICAgICAgICAgbWF4PXsgMTAwIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDxSYW5nZUNvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdNYXJnaW4gQm90dG9tIChweCknLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgbWFyZ2luX2JvdHRvbSB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZU1hcmdpbkJvdHRvbSB9XG4gICAgICAgICAgICAgICAgICAgIG1pbj17IC0xMDAgfVxuICAgICAgICAgICAgICAgICAgICBtYXg9eyAxMDAgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgKTtcbiAgICB9XG59IiwiXG4vKipcbiAqIEl0ZW0gQ29tcG9uZW50LlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSBpdGVtVGl0bGUgLSBDdXJyZW50IGl0ZW0gdGl0bGUuXG4gKiBAcGFyYW0ge2Z1bmN0aW9ufSBjbGlja0hhbmRsZXIgLSB0aGlzIGlzIHRoZSBoYW5kbGluZyBmdW5jdGlvbiBmb3IgdGhlIGFkZC9yZW1vdmUgZnVuY3Rpb25cbiAqIEBwYXJhbSB7SW50ZWdlcn0gaXRlbUlkIC0gQ3VycmVudCBpdGVtIElEXG4gKiBAcGFyYW0gaWNvblxuICogQHJldHVybnMgeyp9IEl0ZW0gSFRNTC5cbiAqL1xuZXhwb3J0IGNvbnN0IEl0ZW0gPSAoeyB0aXRsZTogeyByZW5kZXJlZDogaXRlbVRpdGxlIH0gPSB7fSwgbmFtZSwgY2xpY2tIYW5kbGVyLCBpZDogaXRlbUlkLCBpY29uIH0pID0+IChcbiAgICA8YXJ0aWNsZSBjbGFzc05hbWU9XCJpdGVtXCI+XG4gICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiaXRlbS1ib2R5XCI+XG4gICAgICAgICAgICA8aDMgY2xhc3NOYW1lPVwiaXRlbS10aXRsZVwiIHN0eWxlPXt7bWFyZ2luVG9wOiAnMCd9fT57aXRlbVRpdGxlfXtuYW1lfTwvaDM+XG4gICAgICAgIDwvZGl2PlxuICAgICAgICA8YnV0dG9uIG9uQ2xpY2s9eygpID0+IGNsaWNrSGFuZGxlcihpdGVtSWQpfT57aWNvbn08L2J1dHRvbj5cbiAgICA8L2FydGljbGU+XG4pOyIsImltcG9ydCB7IEl0ZW0gfSBmcm9tICcuL0l0ZW0nO1xuXG5jb25zdCB7IF9fIH0gPSB3cC5pMThuO1xuXG4vKipcbiAqIEl0ZW1MaXN0IENvbXBvbmVudFxuICogQHBhcmFtIG9iamVjdCBwcm9wcyAtIENvbXBvbmVudCBwcm9wcy5cbiAqIEByZXR1cm5zIHsqfVxuICogQGNvbnN0cnVjdG9yXG4gKi9cbmV4cG9ydCBjb25zdCBJdGVtTGlzdCA9IHByb3BzID0+IHtcbiAgICBjb25zdCB7IGZpbHRlcmVkID0gZmFsc2UsIGxvYWRpbmcgPSBmYWxzZSwgaXRlbXMgPSBbXSwgYWN0aW9uID0gKCkgPT4ge30sIGljb24gPSBudWxsIH0gPSBwcm9wcztcblxuICAgIGlmIChsb2FkaW5nKSB7XG4gICAgICAgIHJldHVybiA8cCBjbGFzc05hbWU9XCJsb2FkaW5nLWl0ZW1zXCI+e19fKCdMb2FkaW5nIC4uLicsICd2b2RpLWV4dGVuc2lvbnMnKX08L3A+O1xuICAgIH1cblxuICAgIGlmIChmaWx0ZXJlZCAmJiBpdGVtcy5sZW5ndGggPCAxKSB7XG4gICAgICAgIHJldHVybiAoXG4gICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cIml0ZW0tbGlzdFwiPlxuICAgICAgICAgICAgICAgIDxwPntfXygnWW91ciBxdWVyeSB5aWVsZGVkIG5vIHJlc3VsdHMsIHBsZWFzZSB0cnkgYWdhaW4uJywgJ3ZvZGktZXh0ZW5zaW9ucycpfTwvcD5cbiAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICApO1xuICAgIH1cblxuICAgIGlmICggISBpdGVtcyB8fCBpdGVtcy5sZW5ndGggPCAxICkge1xuICAgICAgICByZXR1cm4gPHAgY2xhc3NOYW1lPVwibm8taXRlbXNcIj57X18oJ05vdCBmb3VuZC4nLCAndm9kaS1leHRlbnNpb25zJyl9PC9wPlxuICAgIH1cblxuICAgIHJldHVybiAoXG4gICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiaXRlbS1saXN0XCI+XG4gICAgICAgICAgICB7aXRlbXMubWFwKChpdGVtKSA9PiA8SXRlbSBrZXk9e2l0ZW0uaWR9IHsuLi5pdGVtfSBjbGlja0hhbmRsZXI9e2FjdGlvbn0gaWNvbj17aWNvbn0gLz4pfVxuICAgICAgICA8L2Rpdj5cbiAgICApO1xufTsiLCJpbXBvcnQgeyBJdGVtTGlzdCB9IGZyb20gJy4vSXRlbUxpc3QnO1xuaW1wb3J0ICogYXMgYXBpIGZyb20gJy4uL3V0aWxzL2FwaSc7XG5pbXBvcnQgeyB1bmlxdWVCeUlkLCBkZWJvdW5jZSB9IGZyb20gJy4uL3V0aWxzL3VzZWZ1bC1mdW5jcyc7XG5cbmNvbnN0IHsgX18gfSA9IHdwLmkxOG47XG5jb25zdCB7IEljb24gfSA9IHdwLmNvbXBvbmVudHM7XG5jb25zdCB7IENvbXBvbmVudCB9ID0gd3AuZWxlbWVudDtcblxuLyoqXG4gKiBQb3N0U2VsZWN0b3IgQ29tcG9uZW50XG4gKi9cbmV4cG9ydCBjbGFzcyBQb3N0U2VsZWN0b3IgZXh0ZW5kcyBDb21wb25lbnQge1xuICAgIC8qKlxuICAgICAqIENvbnN0cnVjdG9yIGZvciBQb3N0U2VsZWN0b3IgQ29tcG9uZW50LlxuICAgICAqIFNldHMgdXAgc3RhdGUsIGFuZCBjcmVhdGVzIGJpbmRpbmdzIGZvciBmdW5jdGlvbnMuXG4gICAgICogQHBhcmFtIG9iamVjdCBwcm9wcyAtIGN1cnJlbnQgY29tcG9uZW50IHByb3BlcnRpZXMuXG4gICAgICovXG4gICAgY29uc3RydWN0b3IocHJvcHMpIHtcbiAgICAgICAgc3VwZXIoLi4uYXJndW1lbnRzKTtcbiAgICAgICAgdGhpcy5wcm9wcyA9IHByb3BzO1xuXG4gICAgICAgIHRoaXMuc3RhdGUgPSB7XG4gICAgICAgICAgICBwb3N0czogW10sXG4gICAgICAgICAgICBsb2FkaW5nOiBmYWxzZSxcbiAgICAgICAgICAgIHR5cGU6IHByb3BzLnBvc3RUeXBlIHx8ICdwb3N0JyxcbiAgICAgICAgICAgIHR5cGVzOiBbXSxcbiAgICAgICAgICAgIGZpbHRlcjogJycsXG4gICAgICAgICAgICBmaWx0ZXJMb2FkaW5nOiBmYWxzZSxcbiAgICAgICAgICAgIGZpbHRlclBvc3RzOiBbXSxcbiAgICAgICAgICAgIGluaXRpYWxMb2FkaW5nOiBmYWxzZSxcbiAgICAgICAgICAgIHNlbGVjdGVkUG9zdHM6IFtdLFxuICAgICAgICB9O1xuXG4gICAgICAgIHRoaXMuYWRkUG9zdCA9IHRoaXMuYWRkUG9zdC5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLnJlbW92ZVBvc3QgPSB0aGlzLnJlbW92ZVBvc3QuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5oYW5kbGVJbnB1dEZpbHRlckNoYW5nZSA9IHRoaXMuaGFuZGxlSW5wdXRGaWx0ZXJDaGFuZ2UuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5kb1Bvc3RGaWx0ZXIgPSBkZWJvdW5jZSh0aGlzLmRvUG9zdEZpbHRlci5iaW5kKHRoaXMpLCAzMDApO1xuICAgICAgICB0aGlzLmdldFNlbGVjdGVkUG9zdElkcyA9IHRoaXMuZ2V0U2VsZWN0ZWRQb3N0SWRzLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMuZ2V0U2VsZWN0ZWRQb3N0cyA9IHRoaXMuZ2V0U2VsZWN0ZWRQb3N0cy5iaW5kKHRoaXMpO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFdoZW4gdGhlIGNvbXBvbmVudCBtb3VudHMgaXQgY2FsbHMgdGhpcyBmdW5jdGlvbi5cbiAgICAgKiBGZXRjaGVzIHBvc3RzIHR5cGVzLCBzZWxlY3RlZCBwb3N0cyB0aGVuIG1ha2VzIGZpcnN0IGNhbGwgZm9yIHBvc3RzXG4gICAgICovXG4gICAgY29tcG9uZW50RGlkTW91bnQoKSB7XG4gICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgaW5pdGlhbExvYWRpbmc6IHRydWUsXG4gICAgICAgIH0pO1xuXG4gICAgICAgIGFwaS5nZXRQb3N0VHlwZXMoKVxuICAgICAgICAgICAgLnRoZW4oKCByZXNwb25zZSApID0+IHtcbiAgICAgICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICAgICAgdHlwZXM6IHJlc3BvbnNlXG4gICAgICAgICAgICAgICAgfSwgKCkgPT4ge1xuICAgICAgICAgICAgICAgICAgICB0aGlzLnJldHJpZXZlU2VsZWN0ZWRQb3N0cygpXG4gICAgICAgICAgICAgICAgICAgICAgICAudGhlbigoIHNlbGVjdGVkUG9zdHMgKSA9PiB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYoIHNlbGVjdGVkUG9zdHMgKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaW5pdGlhbExvYWRpbmc6IGZhbHNlLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0ZWRQb3N0czogc2VsZWN0ZWRQb3N0cyxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpbml0aWFsTG9hZGluZzogZmFsc2UsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBHZXRQb3N0cyB3cmFwcGVyLCBidWlsZHMgdGhlIHJlcXVlc3QgYXJndW1lbnQgYmFzZWQgc3RhdGUgYW5kIHBhcmFtZXRlcnMgcGFzc2VkL1xuICAgICAqIEBwYXJhbSB7b2JqZWN0fSBhcmdzIC0gZGVzaXJlZCBhcmd1bWVudHMgKGNhbiBiZSBlbXB0eSkuXG4gICAgICogQHJldHVybnMge1Byb21pc2U8VD59XG4gICAgICovXG4gICAgZ2V0UG9zdHMoYXJncyA9IHt9KSB7XG4gICAgICAgIGNvbnN0IHBvc3RJZHMgPSB0aGlzLmdldFNlbGVjdGVkUG9zdElkcygpO1xuXG4gICAgICAgIGNvbnN0IGRlZmF1bHRBcmdzID0ge1xuICAgICAgICAgICAgcGVyX3BhZ2U6IDEwLFxuICAgICAgICAgICAgdHlwZTogdGhpcy5zdGF0ZS50eXBlLFxuICAgICAgICAgICAgc2VhcmNoOiB0aGlzLnN0YXRlLmZpbHRlcixcbiAgICAgICAgfTtcblxuICAgICAgICBjb25zdCByZXF1ZXN0QXJndW1lbnRzID0ge1xuICAgICAgICAgICAgLi4uZGVmYXVsdEFyZ3MsXG4gICAgICAgICAgICAuLi5hcmdzXG4gICAgICAgIH07XG5cbiAgICAgICAgcmVxdWVzdEFyZ3VtZW50cy5yZXN0QmFzZSA9IHRoaXMuc3RhdGUudHlwZXNbdGhpcy5zdGF0ZS50eXBlXS5yZXN0X2Jhc2U7XG5cbiAgICAgICAgcmV0dXJuIGFwaS5nZXRQb3N0cyhyZXF1ZXN0QXJndW1lbnRzKVxuICAgICAgICAgICAgLnRoZW4ocmVzcG9uc2UgPT4ge1xuICAgICAgICAgICAgICAgIGlmIChyZXF1ZXN0QXJndW1lbnRzLnNlYXJjaCkge1xuICAgICAgICAgICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGZpbHRlclBvc3RzOiByZXNwb25zZS5maWx0ZXIoKHsgaWQgfSkgPT4gcG9zdElkcy5pbmRleE9mKGlkKSA9PT0gLTEpLFxuICAgICAgICAgICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgICAgICAgICByZXR1cm4gcmVzcG9uc2U7XG4gICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgICAgIHBvc3RzOiB1bmlxdWVCeUlkKFsuLi50aGlzLnN0YXRlLnBvc3RzLCAuLi5yZXNwb25zZV0pLFxuICAgICAgICAgICAgICAgIH0pO1xuXG4gICAgICAgICAgICAgICAgLy8gcmV0dXJuIHJlc3BvbnNlIHRvIGNvbnRpbnVlIHRoZSBjaGFpblxuICAgICAgICAgICAgICAgIHJldHVybiByZXNwb25zZTtcbiAgICAgICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEdldHMgdGhlIHNlbGVjdGVkIHBvc3RzIGJ5IGlkIGZyb20gdGhlIGBwb3N0c2Agc3RhdGUgb2JqZWN0IGFuZCBzb3J0cyB0aGVtIGJ5IHRoZWlyIHBvc2l0aW9uIGluIHRoZSBzZWxlY3RlZCBhcnJheS5cbiAgICAgKiBAcmV0dXJucyBBcnJheSBvZiBvYmplY3RzLlxuICAgICAqL1xuICAgIGdldFNlbGVjdGVkUG9zdElkcygpIHtcbiAgICAgICAgY29uc3QgeyBzZWxlY3RlZFBvc3RJZHMgfSA9IHRoaXMucHJvcHM7XG5cbiAgICAgICAgaWYoIHNlbGVjdGVkUG9zdElkcyApIHtcbiAgICAgICAgICAgIGNvbnN0IHBvc3RJZHMgPSBBcnJheS5pc0FycmF5KCBzZWxlY3RlZFBvc3RJZHMgKSA/IHNlbGVjdGVkUG9zdElkcyA6IHNlbGVjdGVkUG9zdElkcy5zcGxpdCgnLCcpO1xuICAgICAgICAgICAgcmV0dXJuIHBvc3RJZHM7XG4gICAgICAgIH1cblxuICAgICAgICByZXR1cm4gW107XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogR2V0cyB0aGUgc2VsZWN0ZWQgcG9zdHMgYnkgaWQgZnJvbSB0aGUgYHBvc3RzYCBzdGF0ZSBvYmplY3QgYW5kIHNvcnRzIHRoZW0gYnkgdGhlaXIgcG9zaXRpb24gaW4gdGhlIHNlbGVjdGVkIGFycmF5LlxuICAgICAqIEByZXR1cm5zIEFycmF5IG9mIG9iamVjdHMuXG4gICAgICovXG4gICAgZ2V0U2VsZWN0ZWRQb3N0cyggcG9zdElkcyApIHtcbiAgICAgICAgLy8gY29uc3QgZmlsdGVyUG9zdHNMaXN0ID0gdGhpcy5zdGF0ZS5maWx0ZXJpbmcgJiYgIXRoaXMuc3RhdGUuZmlsdGVyTG9hZGluZyA/IHRoaXMuc3RhdGUuZmlsdGVyUG9zdHMgOiBbXTtcbiAgICAgICAgY29uc3QgcG9zdExpc3QgPSB1bmlxdWVCeUlkKFtcbiAgICAgICAgICAgIC4uLnRoaXMuc3RhdGUuZmlsdGVyUG9zdHMsXG4gICAgICAgICAgICAuLi50aGlzLnN0YXRlLnBvc3RzXG4gICAgICAgIF0pO1xuICAgICAgICBjb25zdCBzZWxlY3RlZFBvc3RzID0gcG9zdExpc3RcbiAgICAgICAgICAgIC5maWx0ZXIoKHsgaWQgfSkgPT4gcG9zdElkcy5pbmRleE9mKGlkKSAhPT0gLTEpXG4gICAgICAgICAgICAuc29ydCgoYSwgYikgPT4ge1xuICAgICAgICAgICAgICAgIGNvbnN0IGFJbmRleCA9IHBvc3RJZHMuaW5kZXhPZihhLmlkKTtcbiAgICAgICAgICAgICAgICBjb25zdCBiSW5kZXggPSBwb3N0SWRzLmluZGV4T2YoYi5pZCk7XG5cbiAgICAgICAgICAgICAgICBpZiAoYUluZGV4ID4gYkluZGV4KSB7XG4gICAgICAgICAgICAgICAgICAgIHJldHVybiAxO1xuICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgIGlmIChhSW5kZXggPCBiSW5kZXgpIHtcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIC0xO1xuICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgIHJldHVybiAwO1xuICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICBzZWxlY3RlZFBvc3RzOiBzZWxlY3RlZFBvc3RzLFxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBNYWtlcyB0aGUgbmVjZXNzYXJ5IGFwaSBjYWxscyB0byBmZXRjaCB0aGUgc2VsZWN0ZWQgcG9zdHMgYW5kIHJldHVybnMgYSBwcm9taXNlLlxuICAgICAqIEByZXR1cm5zIHsqfVxuICAgICAqL1xuICAgIHJldHJpZXZlU2VsZWN0ZWRQb3N0cygpIHtcbiAgICAgICAgY29uc3QgeyBwb3N0VHlwZSwgc2VsZWN0ZWRQb3N0SWRzIH0gPSB0aGlzLnByb3BzO1xuICAgICAgICBjb25zdCB7IHR5cGVzIH0gPSB0aGlzLnN0YXRlO1xuXG4gICAgICAgIGNvbnN0IHBvc3RJZHMgPSB0aGlzLmdldFNlbGVjdGVkUG9zdElkcygpLmpvaW4oJywnKTtcblxuICAgICAgICBpZiAoICEgcG9zdElkcyApIHtcbiAgICAgICAgICAgIC8vIHJldHVybiBhIGZha2UgcHJvbWlzZSB0aGF0IGF1dG8gcmVzb2x2ZXMuXG4gICAgICAgICAgICByZXR1cm4gbmV3IFByb21pc2UoKHJlc29sdmUpID0+IHJlc29sdmUoKSk7XG4gICAgICAgIH1cblxuICAgICAgICBsZXQgcG9zdF9hcmdzID0ge1xuICAgICAgICAgICAgaW5jbHVkZTogcG9zdElkcyxcbiAgICAgICAgICAgIHBlcl9wYWdlOiAxMDAsXG4gICAgICAgICAgICBwb3N0VHlwZVxuICAgICAgICB9O1xuXG4gICAgICAgIGlmKCB0aGlzLnByb3BzLnBvc3RTdGF0dXMgKSB7XG4gICAgICAgICAgICBwb3N0X2FyZ3Muc3RhdHVzID0gdGhpcy5wcm9wcy5wb3N0U3RhdHVzO1xuICAgICAgICB9XG5cbiAgICAgICAgcmV0dXJuIHRoaXMuZ2V0UG9zdHMoe1xuICAgICAgICAgICAgLi4ucG9zdF9hcmdzXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEFkZHMgZGVzaXJlZCBwb3N0IGlkIHRvIHRoZSBzZWxlY3RlZFBvc3RJZHMgTGlzdFxuICAgICAqIEBwYXJhbSB7SW50ZWdlcn0gcG9zdF9pZFxuICAgICAqL1xuICAgIGFkZFBvc3QocG9zdF9pZCkge1xuICAgICAgICBpZiAodGhpcy5zdGF0ZS5maWx0ZXIpIHtcbiAgICAgICAgICAgIGNvbnN0IHBvc3QgPSB0aGlzLnN0YXRlLmZpbHRlclBvc3RzLmZpbHRlcihwID0+IHAuaWQgPT09IHBvc3RfaWQpO1xuICAgICAgICAgICAgY29uc3QgcG9zdHMgPSB1bmlxdWVCeUlkKFtcbiAgICAgICAgICAgICAgICAuLi50aGlzLnN0YXRlLnBvc3RzLFxuICAgICAgICAgICAgICAgIC4uLnBvc3RcbiAgICAgICAgICAgIF0pO1xuXG4gICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICBwb3N0c1xuICAgICAgICAgICAgfSk7XG4gICAgICAgIH1cblxuICAgICAgICBpZiggdGhpcy5wcm9wcy5zZWxlY3RTaW5nbGUgKSB7XG4gICAgICAgICAgICBjb25zdCBzZWxlY3RlZFBvc3RJZHMgPSBbIHBvc3RfaWQgXTtcbiAgICAgICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2VsZWN0ZWRQb3N0SWRzKCBzZWxlY3RlZFBvc3RJZHMgKTtcbiAgICAgICAgICAgIHRoaXMuZ2V0U2VsZWN0ZWRQb3N0cyggc2VsZWN0ZWRQb3N0SWRzICk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBjb25zdCBwb3N0SWRzID0gdGhpcy5nZXRTZWxlY3RlZFBvc3RJZHMoKTtcbiAgICAgICAgICAgIGNvbnN0IHNlbGVjdGVkUG9zdElkcyA9IFsgLi4ucG9zdElkcywgcG9zdF9pZCBdO1xuICAgICAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTZWxlY3RlZFBvc3RJZHMoIHNlbGVjdGVkUG9zdElkcyApO1xuICAgICAgICAgICAgdGhpcy5nZXRTZWxlY3RlZFBvc3RzKCBzZWxlY3RlZFBvc3RJZHMgKTtcbiAgICAgICAgfVxuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFJlbW92ZXMgZGVzaXJlZCBwb3N0IGlkIHRvIHRoZSBzZWxlY3RlZFBvc3RJZHMgTGlzdFxuICAgICAqIEBwYXJhbSB7SW50ZWdlcn0gcG9zdF9pZFxuICAgICAqL1xuICAgIHJlbW92ZVBvc3QocG9zdF9pZCkge1xuICAgICAgICBjb25zdCBwb3N0SWRzID0gdGhpcy5nZXRTZWxlY3RlZFBvc3RJZHMoKTtcbiAgICAgICAgY29uc3Qgc2VsZWN0ZWRQb3N0SWRzID0gWyAuLi5wb3N0SWRzIF0uZmlsdGVyKGlkID0+IGlkICE9PSBwb3N0X2lkKTtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTZWxlY3RlZFBvc3RJZHMoIHNlbGVjdGVkUG9zdElkcyApO1xuICAgICAgICB0aGlzLmdldFNlbGVjdGVkUG9zdHMoIHNlbGVjdGVkUG9zdElkcyApO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEhhbmRsZXMgdGhlIHNlYXJjaCBib3ggaW5wdXQgdmFsdWVcbiAgICAgKiBAcGFyYW0gc3RyaW5nIHR5cGUgLSBjb21lcyBmcm9tIHRoZSBldmVudCBvYmplY3QgdGFyZ2V0LlxuICAgICAqL1xuICAgIGhhbmRsZUlucHV0RmlsdGVyQ2hhbmdlKHsgdGFyZ2V0OiB7IHZhbHVlOmZpbHRlciA9ICcnIH0gPSB7fSB9ID0ge30pIHtcbiAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICBmaWx0ZXJcbiAgICAgICAgfSwgKCkgPT4ge1xuICAgICAgICAgICAgaWYgKCFmaWx0ZXIpIHtcbiAgICAgICAgICAgICAgICAvLyByZW1vdmUgZmlsdGVyZWQgcG9zdHNcbiAgICAgICAgICAgICAgICByZXR1cm4gdGhpcy5zZXRTdGF0ZSh7IGZpbHRlcmVkUG9zdHM6IFtdLCBmaWx0ZXJpbmc6IGZhbHNlIH0pO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICB0aGlzLmRvUG9zdEZpbHRlcigpO1xuICAgICAgICB9KVxuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEFjdHVhbCBhcGkgY2FsbCBmb3Igc2VhcmNoaW5nIGZvciBxdWVyeSwgdGhpcyBmdW5jdGlvbiBpcyBkZWJvdW5jZWQgaW4gY29uc3RydWN0b3IuXG4gICAgICovXG4gICAgZG9Qb3N0RmlsdGVyKCkge1xuICAgICAgICBjb25zdCB7IGZpbHRlciA9ICcnIH0gPSB0aGlzLnN0YXRlO1xuXG4gICAgICAgIGlmICghZmlsdGVyKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgIGZpbHRlcmluZzogdHJ1ZSxcbiAgICAgICAgICAgIGZpbHRlckxvYWRpbmc6IHRydWVcbiAgICAgICAgfSk7XG5cbiAgICAgICAgbGV0IHBvc3RfYXJncyA9IHt9O1xuXG4gICAgICAgIGlmKCB0aGlzLnByb3BzLnBvc3RTdGF0dXMgKSB7XG4gICAgICAgICAgICBwb3N0X2FyZ3Muc3RhdHVzID0gdGhpcy5wcm9wcy5wb3N0U3RhdHVzO1xuICAgICAgICB9XG5cbiAgICAgICAgdGhpcy5nZXRQb3N0cyh7XG4gICAgICAgICAgICAuLi5wb3N0X2FyZ3NcbiAgICAgICAgfSkudGhlbigoKSA9PiB7XG4gICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICBmaWx0ZXJMb2FkaW5nOiBmYWxzZVxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFJlbmRlcnMgdGhlIFBvc3RTZWxlY3RvciBjb21wb25lbnQuXG4gICAgICovXG4gICAgcmVuZGVyKCkge1xuICAgICAgICBjb25zdCBwb3N0TGlzdCA9IHRoaXMuc3RhdGUuZmlsdGVyaW5nICYmICF0aGlzLnN0YXRlLmZpbHRlckxvYWRpbmcgPyB0aGlzLnN0YXRlLmZpbHRlclBvc3RzIDogW107XG5cbiAgICAgICAgY29uc3QgYWRkSWNvbiA9IDxJY29uIGljb249XCJwbHVzXCIgLz47XG4gICAgICAgIGNvbnN0IHJlbW92ZUljb24gPSA8SWNvbiBpY29uPVwibWludXNcIiAvPjtcblxuICAgICAgICBjb25zdCBzZWFyY2hpbnB1dHVuaXF1ZUlkID0gJ3NlYXJjaGlucHV0LScgKyBNYXRoLnJhbmRvbSgpLnRvU3RyaW5nKDM2KS5zdWJzdHIoMiwgMTYpO1xuXG4gICAgICAgIHJldHVybiAoXG4gICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sIGNvbXBvbmVudHMtcG9zdC1zZWxlY3RvclwiPlxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY29tcG9uZW50cy1iYXNlLWNvbnRyb2xfX2ZpZWxkLS1zZWxlY3RlZFwiPlxuICAgICAgICAgICAgICAgICAgICA8aDI+e19fKCdTZWFyY2ggUG9zdCcsICd2b2RpLWV4dGVuc2lvbnMnKX08L2gyPlxuICAgICAgICAgICAgICAgICAgICA8SXRlbUxpc3RcbiAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW1zPXsgWy4uLnRoaXMuc3RhdGUuc2VsZWN0ZWRQb3N0c10gfVxuICAgICAgICAgICAgICAgICAgICAgICAgbG9hZGluZz17dGhpcy5zdGF0ZS5pbml0aWFsTG9hZGluZ31cbiAgICAgICAgICAgICAgICAgICAgICAgIGFjdGlvbj17dGhpcy5yZW1vdmVQb3N0fVxuICAgICAgICAgICAgICAgICAgICAgICAgaWNvbj17cmVtb3ZlSWNvbn1cbiAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sX19maWVsZFwiPlxuICAgICAgICAgICAgICAgICAgICA8bGFiZWwgaHRtbEZvcj17c2VhcmNoaW5wdXR1bmlxdWVJZH0gY2xhc3NOYW1lPVwiY29tcG9uZW50cy1iYXNlLWNvbnRyb2xfX2xhYmVsXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICA8SWNvbiBpY29uPVwic2VhcmNoXCIgLz5cbiAgICAgICAgICAgICAgICAgICAgPC9sYWJlbD5cbiAgICAgICAgICAgICAgICAgICAgPGlucHV0XG4gICAgICAgICAgICAgICAgICAgICAgICBjbGFzc05hbWU9XCJjb21wb25lbnRzLXRleHQtY29udHJvbF9faW5wdXRcIlxuICAgICAgICAgICAgICAgICAgICAgICAgaWQ9e3NlYXJjaGlucHV0dW5pcXVlSWR9XG4gICAgICAgICAgICAgICAgICAgICAgICB0eXBlPVwic2VhcmNoXCJcbiAgICAgICAgICAgICAgICAgICAgICAgIHBsYWNlaG9sZGVyPXtfXygnUGxlYXNlIGVudGVyIHlvdXIgc2VhcmNoIHF1ZXJ5Li4uJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9e3RoaXMuc3RhdGUuZmlsdGVyfVxuICAgICAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9e3RoaXMuaGFuZGxlSW5wdXRGaWx0ZXJDaGFuZ2V9XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgIDxJdGVtTGlzdFxuICAgICAgICAgICAgICAgICAgICAgICAgaXRlbXM9e3Bvc3RMaXN0fVxuICAgICAgICAgICAgICAgICAgICAgICAgbG9hZGluZz17dGhpcy5zdGF0ZS5pbml0aWFsTG9hZGluZ3x8dGhpcy5zdGF0ZS5sb2FkaW5nfHx0aGlzLnN0YXRlLmZpbHRlckxvYWRpbmd9XG4gICAgICAgICAgICAgICAgICAgICAgICBmaWx0ZXJlZD17dGhpcy5zdGF0ZS5maWx0ZXJpbmd9XG4gICAgICAgICAgICAgICAgICAgICAgICBhY3Rpb249e3RoaXMuYWRkUG9zdH1cbiAgICAgICAgICAgICAgICAgICAgICAgIGljb249e2FkZEljb259XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgKTtcbiAgICB9XG59IiwiY29uc3QgeyBfXyB9ID0gd3AuaTE4bjtcbmNvbnN0IHsgQ29tcG9uZW50LCBDaGlsZHJlbiB9ID0gd3AuZWxlbWVudDtcbmNvbnN0IHsgUGFuZWwsIEJ1dHRvbiwgSWNvbiB9ID0gd3AuY29tcG9uZW50cztcblxuLyoqXG4gKiBSZXBlYXRlciBDb21wb25lbnRcbiAqL1xuZXhwb3J0IGNsYXNzIFJlcGVhdGVyIGV4dGVuZHMgQ29tcG9uZW50IHtcbiAgICAvKipcbiAgICAgKiBDb25zdHJ1Y3RvciBmb3IgUmVwZWF0ZXIgQ29tcG9uZW50LlxuICAgICAqIFNldHMgdXAgc3RhdGUsIGFuZCBjcmVhdGVzIGJpbmRpbmdzIGZvciBmdW5jdGlvbnMuXG4gICAgICogQHBhcmFtIG9iamVjdCBwcm9wcyAtIGN1cnJlbnQgY29tcG9uZW50IHByb3BlcnRpZXMuXG4gICAgICovXG4gICAgY29uc3RydWN0b3IocHJvcHMpIHtcbiAgICAgICAgc3VwZXIoLi4uYXJndW1lbnRzKTtcbiAgICAgICAgdGhpcy5wcm9wcyA9IHByb3BzO1xuXG4gICAgICAgIHRoaXMucmVuZGVyQWRkQnV0dG9uID0gdGhpcy5yZW5kZXJBZGRCdXR0b24uYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5yZW5kZXJSZW1vdmVCdXR0b24gPSB0aGlzLnJlbmRlclJlbW92ZUJ1dHRvbi5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLmhhbmRsZUFkZCA9IHRoaXMuaGFuZGxlQWRkLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMuaGFuZGxlUmVtb3ZlID0gdGhpcy5oYW5kbGVSZW1vdmUuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5yZW5kZXJDaGlsZHJlbkVsZW1lbnRzID0gdGhpcy5yZW5kZXJDaGlsZHJlbkVsZW1lbnRzLmJpbmQodGhpcyk7XG4gICAgfVxuXG4gICAgcmVuZGVyQWRkQnV0dG9uKCkge1xuICAgICAgICByZXR1cm4oXG4gICAgICAgICAgICA8QnV0dG9uIGlzRGVmYXVsdCBjbGFzc05hbWU9XCJidXR0b24tZnVsbHdpZHRoXCIgb25DbGljaz17dGhpcy5oYW5kbGVBZGR9PlxuICAgICAgICAgICAgICAgIDxJY29uIGljb249XCJwbHVzXCIgLz5cbiAgICAgICAgICAgIDwvQnV0dG9uPlxuICAgICAgICApO1xuICAgIH1cblxuICAgIHJlbmRlclJlbW92ZUJ1dHRvbigpIHtcbiAgICAgICAgcmV0dXJuKFxuICAgICAgICAgICAgPEJ1dHRvbiBpc0Rlc3RydWN0aXZlIGNsYXNzTmFtZT1cImJ1dHRvbi1yZW1vdmVcIiBvbkNsaWNrPXt0aGlzLmhhbmRsZVJlbW92ZX0+XG4gICAgICAgICAgICAgICAgPEljb24gaWNvbj1cImRpc21pc3NcIiAvPlxuICAgICAgICAgICAgPC9CdXR0b24+XG4gICAgICAgICk7XG4gICAgfVxuXG4gICAgaGFuZGxlQWRkKCkge1xuICAgICAgICBjb25zdCB7IGRlZmF1bHRWYWx1ZXMsIHVwZGF0ZVZhbHVlcyB9ID0gdGhpcy5wcm9wcztcbiAgICAgICAgY29uc3QgeyB2YWx1ZXMgfSA9IHRoaXMucHJvcHM7XG4gICAgICAgIGNvbnN0IGN1cnJlbnRfdmFsdWVzID0gdmFsdWVzID8gWyAuLi52YWx1ZXMsIHsgLi4uZGVmYXVsdFZhbHVlcyB9IF0gOiBbIHsgLi4uZGVmYXVsdFZhbHVlcyB9IF07XG4gICAgICAgIHVwZGF0ZVZhbHVlcyggY3VycmVudF92YWx1ZXMgKTtcbiAgICB9XG5cbiAgICBoYW5kbGVSZW1vdmUoIGluZGV4ICkge1xuICAgICAgICBjb25zdCB7IHVwZGF0ZVZhbHVlcyB9ID0gdGhpcy5wcm9wcztcbiAgICAgICAgY29uc3QgeyB2YWx1ZXMgfSA9IHRoaXMucHJvcHM7XG4gICAgICAgIGNvbnN0IGN1cnJlbnRfdmFsdWVzID0gdmFsdWVzLmZpbHRlciggKCB2YWx1ZSwgaSApID0+IGkgIT0gaW5kZXggKTtcbiAgICAgICAgdXBkYXRlVmFsdWVzKCBjdXJyZW50X3ZhbHVlcyApO1xuICAgIH1cblxuICAgIHJlbmRlckNoaWxkcmVuRWxlbWVudHMoKSB7XG4gICAgICAgIGNvbnN0IHsgY2hpbGRyZW4gfSA9IHRoaXMucHJvcHM7XG4gICAgICAgIGNvbnN0IHsgdmFsdWVzIH0gPSB0aGlzLnByb3BzO1xuXG4gICAgICAgIGlmKCAhIHZhbHVlcyApIHtcbiAgICAgICAgICAgIHJldHVybiBbXTtcbiAgICAgICAgfVxuXG4gICAgICAgIGNvbnN0IHJlbW92ZV9idXR0b24gPSB0aGlzLnJlbmRlclJlbW92ZUJ1dHRvbigpO1xuXG4gICAgICAgIHJldHVybiB2YWx1ZXMubWFwKCAoIHZhbHVlLCBpbmRleCApID0+IHtcbiAgICAgICAgICAgIGNvbnN0IHVwZGF0ZWRfY2hpbGRyZW4gPSBDaGlsZHJlbi5tYXAoY2hpbGRyZW4sICggY2hpbGQgKSA9PiB7XG4gICAgICAgICAgICAgICAgbGV0IGNoaWxkX3Byb3BzID0geyAuLi5jaGlsZC5wcm9wcyB9O1xuICAgICAgICAgICAgICAgIGlmKCB2YWx1ZXNbaW5kZXhdW2NoaWxkLnByb3BzLm5hbWVdICkge1xuICAgICAgICAgICAgICAgICAgICBjaGlsZF9wcm9wc1tjaGlsZC5wcm9wcy52YWx1ZWtleV0gPSB2YWx1ZXNbaW5kZXhdW2NoaWxkLnByb3BzLm5hbWVdO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBjaGlsZF9wcm9wc1tjaGlsZC5wcm9wcy50cmlnZ2VyX21ldGhvZF9uYW1lXSA9ICh2YWx1ZSkgPT4gY2hpbGQucHJvcHNbY2hpbGQucHJvcHMudHJpZ2dlcl9tZXRob2RfbmFtZV0odmFsdWUsIGluZGV4KTtcbiAgICAgICAgICAgICAgICByZXR1cm4gUmVhY3QuY2xvbmVFbGVtZW50KCBjaGlsZCwgeyAuLi5jaGlsZF9wcm9wcyB9ICk7XG4gICAgICAgICAgICB9ICk7XG5cbiAgICAgICAgICAgIGNvbnN0IHVwZGF0ZWRfcmVtb3ZlX2J1dHRvbiA9IFJlYWN0LmNsb25lRWxlbWVudCggcmVtb3ZlX2J1dHRvbiwgeyBrZXk6ICdyZXBlYXRlci1yZW1vdmUtJytpbmRleCwgb25DbGljazogKCkgPT4gcmVtb3ZlX2J1dHRvbi5wcm9wc1snb25DbGljayddKGluZGV4KSB9ICk7XG5cbiAgICAgICAgICAgIHJldHVybiBSZWFjdC5jcmVhdGVFbGVtZW50KCBQYW5lbCwgeyBrZXk6ICdyZXBlYXRlci1jaGlsZC0nK2luZGV4IH0sIFt1cGRhdGVkX2NoaWxkcmVuLCB1cGRhdGVkX3JlbW92ZV9idXR0b25dKTtcbiAgICAgICAgfSApO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFJlbmRlcnMgdGhlIFJlcGVhdGVyIGNvbXBvbmVudC5cbiAgICAgKi9cbiAgICByZW5kZXIoKSB7XG4gICAgICAgIHJldHVybiAoXG4gICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sIHJlcGVhdGVyLWNvbXBvbmVudFwiPlxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY29tcG9uZW50cy1iYXNlLWNvbnRyb2xfX2ZpZWxkXCI+XG4gICAgICAgICAgICAgICAgICAgIDxsYWJlbCBjbGFzc05hbWU9XCJjb21wb25lbnRzLWJhc2UtY29udHJvbF9fbGFiZWxcIj57dGhpcy5wcm9wcy50aXRsZX08L2xhYmVsPlxuICAgICAgICAgICAgICAgICAgICB7dGhpcy5yZW5kZXJDaGlsZHJlbkVsZW1lbnRzKCl9XG4gICAgICAgICAgICAgICAgICAgIHt0aGlzLnJlbmRlckFkZEJ1dHRvbigpfVxuICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICk7XG4gICAgfVxufSIsImltcG9ydCB7IFBvc3RTZWxlY3RvciB9IGZyb20gJy4vUG9zdFNlbGVjdG9yJztcbmltcG9ydCB7IFRlcm1TZWxlY3RvciB9IGZyb20gJy4vVGVybVNlbGVjdG9yJztcblxuY29uc3QgeyBfXyB9ID0gd3AuaTE4bjtcbmNvbnN0IHsgQ29tcG9uZW50IH0gPSB3cC5lbGVtZW50O1xuY29uc3QgeyBSYW5nZUNvbnRyb2wsIFNlbGVjdENvbnRyb2wsIENoZWNrYm94Q29udHJvbCB9ID0gd3AuY29tcG9uZW50cztcbmNvbnN0IHsgYXBwbHlGaWx0ZXJzIH0gPSB3cC5ob29rcztcblxuLyoqXG4gKiBTaG9ydGNvZGVBdHRzIENvbXBvbmVudFxuICovXG5leHBvcnQgY2xhc3MgU2hvcnRjb2RlQXR0cyBleHRlbmRzIENvbXBvbmVudCB7XG4gICAgLyoqXG4gICAgICogQ29uc3RydWN0b3IgZm9yIFNob3J0Y29kZUF0dHMgQ29tcG9uZW50LlxuICAgICAqIFNldHMgdXAgc3RhdGUsIGFuZCBjcmVhdGVzIGJpbmRpbmdzIGZvciBmdW5jdGlvbnMuXG4gICAgICogQHBhcmFtIG9iamVjdCBwcm9wcyAtIGN1cnJlbnQgY29tcG9uZW50IHByb3BlcnRpZXMuXG4gICAgICovXG4gICAgY29uc3RydWN0b3IocHJvcHMpIHtcbiAgICAgICAgc3VwZXIoLi4uYXJndW1lbnRzKTtcbiAgICAgICAgdGhpcy5wcm9wcyA9IHByb3BzO1xuXG4gICAgICAgIHRoaXMub25DaGFuZ2VMaW1pdCA9IHRoaXMub25DaGFuZ2VMaW1pdC5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlQ29sdW1ucyA9IHRoaXMub25DaGFuZ2VDb2x1bW5zLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VPcmRlcmJ5ID0gdGhpcy5vbkNoYW5nZU9yZGVyYnkuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZU9yZGVyID0gdGhpcy5vbkNoYW5nZU9yZGVyLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VJZHMgPSB0aGlzLm9uQ2hhbmdlSWRzLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VDYXRlZ29yeSA9IHRoaXMub25DaGFuZ2VDYXRlZ29yeS5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlR2VucmUgPSB0aGlzLm9uQ2hhbmdlR2VucmUuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZVRhZyA9IHRoaXMub25DaGFuZ2VUYWcuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZUZlYXR1cmVkID0gdGhpcy5vbkNoYW5nZUZlYXR1cmVkLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VUb3BSYXRlZCA9IHRoaXMub25DaGFuZ2VUb3BSYXRlZC5iaW5kKHRoaXMpO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlTGltaXQoIG5ld0xpbWl0ICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZVNob3J0Y29kZUF0dHMoe1xuICAgICAgICAgICAgbGltaXQ6IG5ld0xpbWl0XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlQ29sdW1ucyggbmV3Q29sdW1ucyApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTaG9ydGNvZGVBdHRzKHtcbiAgICAgICAgICAgIGNvbHVtbnM6IG5ld0NvbHVtbnNcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VPcmRlcmJ5KCBuZXdPcmRlcmJ5ICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZVNob3J0Y29kZUF0dHMoe1xuICAgICAgICAgICAgb3JkZXJieTogbmV3T3JkZXJieVxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZU9yZGVyKCBuZXdPcmRlciApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTaG9ydGNvZGVBdHRzKHtcbiAgICAgICAgICAgIG9yZGVyOiBuZXdPcmRlclxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZUlkcyggbmV3SWRzICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZVNob3J0Y29kZUF0dHMoe1xuICAgICAgICAgICAgaWRzOiBuZXdJZHMuam9pbignLCcpXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlQ2F0ZWdvcnkoIG5ld0NhdGVnb3J5ICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZVNob3J0Y29kZUF0dHMoe1xuICAgICAgICAgICAgY2F0ZWdvcnk6IG5ld0NhdGVnb3J5LmpvaW4oJywnKVxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZUdlbnJlKCBuZXdHZW5yZSApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTaG9ydGNvZGVBdHRzKHtcbiAgICAgICAgICAgIGdlbnJlOiBuZXdHZW5yZS5qb2luKCcsJylcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VUYWcoIG5ld1RhZyApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTaG9ydGNvZGVBdHRzKHtcbiAgICAgICAgICAgIHRhZzogbmV3VGFnLmpvaW4oJywnKVxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZUZlYXR1cmVkKCBuZXdGZWF0dXJlZCApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTaG9ydGNvZGVBdHRzKHtcbiAgICAgICAgICAgIGZlYXR1cmVkOiBuZXdGZWF0dXJlZFxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZVRvcFJhdGVkKCBuZXdUb3BSYXRlZCApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTaG9ydGNvZGVBdHRzKHtcbiAgICAgICAgICAgIHRvcF9yYXRlZDogbmV3VG9wUmF0ZWRcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogUmVuZGVycyB0aGUgU2hvcnRjb2RlQXR0cyBjb21wb25lbnQuXG4gICAgICovXG4gICAgcmVuZGVyKCkge1xuICAgICAgICBjb25zdCB7IGF0dHJpYnV0ZXMsIHBvc3RUeXBlLCBwb3N0U3RhdHVzLCBjYXRUYXhvbm9teSwgdGFnVGF4b25vbXksIG1pbkxpbWl0ID0gMSwgbWF4TGltaXQgPSAyMCwgbWluQ29sdW1ucyA9IDEsIG1heENvbHVtbnMgPSA2LCBoaWRlRmllbGRzIH0gPSB0aGlzLnByb3BzO1xuICAgICAgICBjb25zdCB7IGxpbWl0LCBjb2x1bW5zLCBvcmRlcmJ5LCBvcmRlciwgaWRzLCBjYXRlZ29yeSwgZ2VucmUsIHRhZywgZmVhdHVyZWQsIHRvcF9yYXRlZCB9ID0gYXR0cmlidXRlcztcblxuICAgICAgICByZXR1cm4gKFxuICAgICAgICAgICAgPGRpdj5cbiAgICAgICAgICAgICAgICB7ICEoIGhpZGVGaWVsZHMgJiYgaGlkZUZpZWxkcy5pbmNsdWRlcygnbGltaXQnKSApID8gKFxuICAgICAgICAgICAgICAgIDxSYW5nZUNvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdMaW1pdCcsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBsaW1pdCB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZUxpbWl0IH1cbiAgICAgICAgICAgICAgICAgICAgbWluPXsgYXBwbHlGaWx0ZXJzKCAndm9kaS5jb21wb25lbnQuc2hvcnRjb2RlQXR0cy5saW1pdC5taW4nLCBtaW5MaW1pdCApIH1cbiAgICAgICAgICAgICAgICAgICAgbWF4PXsgYXBwbHlGaWx0ZXJzKCAndm9kaS5jb21wb25lbnQuc2hvcnRjb2RlQXR0cy5saW1pdC5tYXgnLCBtYXhMaW1pdCApIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICkgOiAnJyB9XG4gICAgICAgICAgICAgICAgeyAhKCBoaWRlRmllbGRzICYmIGhpZGVGaWVsZHMuaW5jbHVkZXMoJ2NvbHVtbnMnKSApID8gKFxuICAgICAgICAgICAgICAgIDxSYW5nZUNvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdDb2x1bW5zJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IGNvbHVtbnMgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VDb2x1bW5zIH1cbiAgICAgICAgICAgICAgICAgICAgbWluPXsgYXBwbHlGaWx0ZXJzKCAndm9kaS5jb21wb25lbnQuc2hvcnRjb2RlQXR0cy5jb2x1bW5zLm1pbicsIG1pbkNvbHVtbnMgKSB9XG4gICAgICAgICAgICAgICAgICAgIG1heD17IGFwcGx5RmlsdGVycyggJ3ZvZGkuY29tcG9uZW50LnNob3J0Y29kZUF0dHMuY29sdW1ucy5tYXgnLCBtYXhDb2x1bW5zICkgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgKSA6ICcnIH1cbiAgICAgICAgICAgICAgICB7ICEoIGhpZGVGaWVsZHMgJiYgaGlkZUZpZWxkcy5pbmNsdWRlcygnb3JkZXJieScpICkgPyAoXG4gICAgICAgICAgICAgICAgPFNlbGVjdENvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdPcmRlcmJ5JywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IG9yZGVyYnkgfVxuICAgICAgICAgICAgICAgICAgICBvcHRpb25zPXsgYXBwbHlGaWx0ZXJzKCAndm9kaS5jb21wb25lbnQuc2hvcnRjb2RlQXR0cy5vcmRlcmJ5Lm9wdGlvbnMnLCBbXG4gICAgICAgICAgICAgICAgICAgICAgICB7IGxhYmVsOiBfXygnVGl0bGUnLCAndm9kaS1leHRlbnNpb25zJyksIHZhbHVlOiAndGl0bGUnIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICB7IGxhYmVsOiBfXygnRGF0ZScsICd2b2RpLWV4dGVuc2lvbnMnKSwgdmFsdWU6ICggcG9zdFR5cGUgPT09ICdtb3ZpZScgPyAncmVsZWFzZV9kYXRlJyA6ICdkYXRlJyApIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICB7IGxhYmVsOiBfXygnSUQnLCAndm9kaS1leHRlbnNpb25zJyksIHZhbHVlOiAnaWQnIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICB7IGxhYmVsOiBfXygnUmFuZG9tJywgJ3ZvZGktZXh0ZW5zaW9ucycpLCB2YWx1ZTogJ3JhbmQnIH0sXG4gICAgICAgICAgICAgICAgICAgIF0sIHRoaXMucHJvcHMgKSB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZU9yZGVyYnkgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgKSA6ICcnIH1cbiAgICAgICAgICAgICAgICB7ICEoIGhpZGVGaWVsZHMgJiYgaGlkZUZpZWxkcy5pbmNsdWRlcygnb3JkZXInKSApID8gKFxuICAgICAgICAgICAgICAgIDxTZWxlY3RDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnT3JkZXInLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgb3JkZXIgfVxuICAgICAgICAgICAgICAgICAgICBvcHRpb25zPXsgYXBwbHlGaWx0ZXJzKCAndm9kaS5jb21wb25lbnQuc2hvcnRjb2RlQXR0cy5vcmRlci5vcHRpb25zJywgW1xuICAgICAgICAgICAgICAgICAgICAgICAgeyBsYWJlbDogX18oJ0FTQycsICd2b2RpLWV4dGVuc2lvbnMnKSwgdmFsdWU6ICdBU0MnIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICB7IGxhYmVsOiBfXygnREVTQycsICd2b2RpLWV4dGVuc2lvbnMnKSwgdmFsdWU6ICdERVNDJyB9LFxuICAgICAgICAgICAgICAgICAgICBdLCB0aGlzLnByb3BzICkgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VPcmRlciB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICApIDogJycgfVxuICAgICAgICAgICAgICAgIHsgISggaGlkZUZpZWxkcyAmJiBoaWRlRmllbGRzLmluY2x1ZGVzKCdpZHMnKSApID8gKFxuICAgICAgICAgICAgICAgIDxQb3N0U2VsZWN0b3JcbiAgICAgICAgICAgICAgICAgICAgcG9zdFR5cGUgPSB7IHBvc3RUeXBlIH1cbiAgICAgICAgICAgICAgICAgICAgcG9zdFN0YXR1cyA9IHsgcG9zdFN0YXR1cyB9XG4gICAgICAgICAgICAgICAgICAgIHNlbGVjdGVkUG9zdElkcz17IGlkcyA/IGlkcy5zcGxpdCgnLCcpLm1hcChOdW1iZXIpIDogW10gfVxuICAgICAgICAgICAgICAgICAgICB1cGRhdGVTZWxlY3RlZFBvc3RJZHM9eyB0aGlzLm9uQ2hhbmdlSWRzIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICkgOiAnJyB9XG4gICAgICAgICAgICAgICAgeyAoIHBvc3RUeXBlID09PSAndmlkZW8nICkgJiYgY2F0VGF4b25vbXkgJiYgISggaGlkZUZpZWxkcyAmJiBoaWRlRmllbGRzLmluY2x1ZGVzKCdjYXRlZ29yeScpICkgPyAoXG4gICAgICAgICAgICAgICAgPFRlcm1TZWxlY3RvclxuICAgICAgICAgICAgICAgICAgICBwb3N0VHlwZSA9IHsgcG9zdFR5cGUgfVxuICAgICAgICAgICAgICAgICAgICB0YXhvbm9teSA9IHsgY2F0VGF4b25vbXkgfVxuICAgICAgICAgICAgICAgICAgICB0aXRsZSA9IHsgX18oJ1NlYXJjaCBDYXRlZ29yeScsICd2b2RpLWV4dGVuc2lvbnMnKSB9XG4gICAgICAgICAgICAgICAgICAgIHNlbGVjdGVkVGVybUlkcz17IGNhdGVnb3J5ID8gY2F0ZWdvcnkuc3BsaXQoJywnKS5tYXAoTnVtYmVyKSA6IFtdIH1cbiAgICAgICAgICAgICAgICAgICAgdXBkYXRlU2VsZWN0ZWRUZXJtSWRzPXsgdGhpcy5vbkNoYW5nZUNhdGVnb3J5IH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICkgOiAoIGNhdFRheG9ub215ICYmICEoIGhpZGVGaWVsZHMgJiYgaGlkZUZpZWxkcy5pbmNsdWRlcygnZ2VucmUnKSApID8gKFxuICAgICAgICAgICAgICAgIDxUZXJtU2VsZWN0b3JcbiAgICAgICAgICAgICAgICAgICAgcG9zdFR5cGUgPSB7IHBvc3RUeXBlIH1cbiAgICAgICAgICAgICAgICAgICAgdGF4b25vbXkgPSB7IGNhdFRheG9ub215IH1cbiAgICAgICAgICAgICAgICAgICAgdGl0bGUgPSB7IF9fKCdTZWFyY2ggR2VucmUnLCAndm9kaS1leHRlbnNpb25zJykgfVxuICAgICAgICAgICAgICAgICAgICBzZWxlY3RlZFRlcm1JZHM9eyBnZW5yZSA/IGdlbnJlLnNwbGl0KCcsJykubWFwKE51bWJlcikgOiBbXSB9XG4gICAgICAgICAgICAgICAgICAgIHVwZGF0ZVNlbGVjdGVkVGVybUlkcz17IHRoaXMub25DaGFuZ2VHZW5yZSB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICApIDogJycgKSB9XG4gICAgICAgICAgICAgICAgeyAhKCBoaWRlRmllbGRzICYmIGhpZGVGaWVsZHMuaW5jbHVkZXMoJ3RhZycpICkgPyAoXG4gICAgICAgICAgICAgICAgPFRlcm1TZWxlY3RvclxuICAgICAgICAgICAgICAgICAgICBwb3N0VHlwZSA9IHsgcG9zdFR5cGUgfVxuICAgICAgICAgICAgICAgICAgICB0YXhvbm9teSA9IHsgdGFnVGF4b25vbXkgfVxuICAgICAgICAgICAgICAgICAgICB0aXRsZSA9IHsgX18oJ1NlYXJjaCBUYWcnLCAndm9kaS1leHRlbnNpb25zJykgfVxuICAgICAgICAgICAgICAgICAgICBzZWxlY3RlZFRlcm1JZHM9eyB0YWcgPyB0YWcuc3BsaXQoJywnKS5tYXAoTnVtYmVyKSA6IFtdIH1cbiAgICAgICAgICAgICAgICAgICAgdXBkYXRlU2VsZWN0ZWRUZXJtSWRzPXsgdGhpcy5vbkNoYW5nZVRhZyB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICApIDogJycgfVxuICAgICAgICAgICAgICAgIHsgISggaGlkZUZpZWxkcyAmJiBoaWRlRmllbGRzLmluY2x1ZGVzKCdmZWF0dXJlZCcpICkgPyAoXG4gICAgICAgICAgICAgICAgPENoZWNrYm94Q29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ0ZlYXR1cmVkJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICBoZWxwPXtfXygnQ2hlY2sgdG8gc2VsZWN0IGZlYXR1cmVkIHBvc3RzLicsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgY2hlY2tlZD17IGZlYXR1cmVkIH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlRmVhdHVyZWQgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgKSA6ICcnIH1cbiAgICAgICAgICAgICAgICB7ICEoIGhpZGVGaWVsZHMgJiYgaGlkZUZpZWxkcy5pbmNsdWRlcygndG9wX3JhdGVkJykgKSA/IChcbiAgICAgICAgICAgICAgICA8Q2hlY2tib3hDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnVG9wIFJhdGVkJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICBoZWxwPXtfXygnQ2hlY2sgdG8gc2VsZWN0IHRvcCByYXRlZCBwb3N0cy4nLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIGNoZWNrZWQ9eyB0b3BfcmF0ZWQgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VUb3BSYXRlZCB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICApIDogJycgfVxuICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICk7XG4gICAgfVxufSIsImltcG9ydCB7IEl0ZW1MaXN0IH0gZnJvbSBcIi4vSXRlbUxpc3RcIjtcbmltcG9ydCAqIGFzIGFwaSBmcm9tICcuLi91dGlscy9hcGknO1xuaW1wb3J0IHsgdW5pcXVlQnlJZCwgZGVib3VuY2UgfSBmcm9tICcuLi91dGlscy91c2VmdWwtZnVuY3MnO1xuXG5jb25zdCB7IF9fIH0gPSB3cC5pMThuO1xuY29uc3QgeyBJY29uIH0gPSB3cC5jb21wb25lbnRzO1xuY29uc3QgeyBDb21wb25lbnQgfSA9IHdwLmVsZW1lbnQ7XG5cbi8qKlxuICogVGVybVNlbGVjdG9yIENvbXBvbmVudFxuICovXG5leHBvcnQgY2xhc3MgVGVybVNlbGVjdG9yIGV4dGVuZHMgQ29tcG9uZW50IHtcbiAgICAvKipcbiAgICAgKiBDb25zdHJ1Y3RvciBmb3IgVGVybVNlbGVjdG9yIENvbXBvbmVudC5cbiAgICAgKiBTZXRzIHVwIHN0YXRlLCBhbmQgY3JlYXRlcyBiaW5kaW5ncyBmb3IgZnVuY3Rpb25zLlxuICAgICAqIEBwYXJhbSBvYmplY3QgcHJvcHMgLSBjdXJyZW50IGNvbXBvbmVudCBwcm9wZXJ0aWVzLlxuICAgICAqL1xuICAgIGNvbnN0cnVjdG9yKHByb3BzKSB7XG4gICAgICAgIHN1cGVyKC4uLmFyZ3VtZW50cyk7XG4gICAgICAgIHRoaXMucHJvcHMgPSBwcm9wcztcblxuICAgICAgICB0aGlzLnN0YXRlID0ge1xuICAgICAgICAgICAgdGVybXM6IFtdLFxuICAgICAgICAgICAgbG9hZGluZzogZmFsc2UsXG4gICAgICAgICAgICB0eXBlOiBwcm9wcy5wb3N0VHlwZSB8fCAncG9zdCcsXG4gICAgICAgICAgICB0YXhvbm9teTogcHJvcHMudGF4b25vbXkgfHwgJ2NhdGVnb3J5JyxcbiAgICAgICAgICAgIHRheG9ub21pZXM6IFtdLFxuICAgICAgICAgICAgZmlsdGVyOiAnJyxcbiAgICAgICAgICAgIGZpbHRlckxvYWRpbmc6IGZhbHNlLFxuICAgICAgICAgICAgZmlsdGVyVGVybXM6IFtdLFxuICAgICAgICAgICAgaW5pdGlhbExvYWRpbmc6IGZhbHNlLFxuICAgICAgICB9O1xuXG4gICAgICAgIHRoaXMuYWRkVGVybSA9IHRoaXMuYWRkVGVybS5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLnJlbW92ZVRlcm0gPSB0aGlzLnJlbW92ZVRlcm0uYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5oYW5kbGVJbnB1dEZpbHRlckNoYW5nZSA9IHRoaXMuaGFuZGxlSW5wdXRGaWx0ZXJDaGFuZ2UuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5kb1Rlcm1GaWx0ZXIgPSBkZWJvdW5jZSh0aGlzLmRvVGVybUZpbHRlci5iaW5kKHRoaXMpLCAzMDApO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFdoZW4gdGhlIGNvbXBvbmVudCBtb3VudHMgaXQgY2FsbHMgdGhpcyBmdW5jdGlvbi5cbiAgICAgKiBGZXRjaGVzIHRlcm1zIHRheG9ub21pZXMsIHNlbGVjdGVkIHRlcm1zIHRoZW4gbWFrZXMgZmlyc3QgY2FsbCBmb3IgdGVybXNcbiAgICAgKi9cbiAgICBjb21wb25lbnREaWRNb3VudCgpIHtcbiAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICBpbml0aWFsTG9hZGluZzogdHJ1ZSxcbiAgICAgICAgfSk7XG5cbiAgICAgICAgYXBpLmdldFRheG9ub21pZXMoIHsgdHlwZTogdGhpcy5zdGF0ZS50eXBlIH0gKVxuICAgICAgICAgICAgLnRoZW4oKCByZXNwb25zZSApID0+IHtcbiAgICAgICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICAgICAgdGF4b25vbWllczogcmVzcG9uc2VcbiAgICAgICAgICAgICAgICB9LCAoKSA9PiB7XG4gICAgICAgICAgICAgICAgICAgIHRoaXMucmV0cmlldmVTZWxlY3RlZFRlcm1zKClcbiAgICAgICAgICAgICAgICAgICAgICAgIC50aGVuKCgpID0+IHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaW5pdGlhbExvYWRpbmc6IGZhbHNlLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEdldFRlcm1zIHdyYXBwZXIsIGJ1aWxkcyB0aGUgcmVxdWVzdCBhcmd1bWVudCBiYXNlZCBzdGF0ZSBhbmQgcGFyYW1ldGVycyBwYXNzZWQvXG4gICAgICogQHBhcmFtIHtvYmplY3R9IGFyZ3MgLSBkZXNpcmVkIGFyZ3VtZW50cyAoY2FuIGJlIGVtcHR5KS5cbiAgICAgKiBAcmV0dXJucyB7UHJvbWlzZTxUPn1cbiAgICAgKi9cbiAgICBnZXRUZXJtcyhhcmdzID0ge30pIHtcbiAgICAgICAgY29uc3QgeyBzZWxlY3RlZFRlcm1JZHMgfSA9IHRoaXMucHJvcHM7XG5cbiAgICAgICAgY29uc3QgZGVmYXVsdEFyZ3MgPSB7XG4gICAgICAgICAgICBwZXJfcGFnZTogMTAsXG4gICAgICAgICAgICB0eXBlOiB0aGlzLnN0YXRlLnR5cGUsXG4gICAgICAgICAgICB0YXhvbm9teTogdGhpcy5zdGF0ZS50YXhvbm9teSxcbiAgICAgICAgICAgIHNlYXJjaDogdGhpcy5zdGF0ZS5maWx0ZXIsXG4gICAgICAgIH07XG5cbiAgICAgICAgY29uc3QgcmVxdWVzdEFyZ3VtZW50cyA9IHtcbiAgICAgICAgICAgIC4uLmRlZmF1bHRBcmdzLFxuICAgICAgICAgICAgLi4uYXJnc1xuICAgICAgICB9O1xuXG4gICAgICAgIHJlcXVlc3RBcmd1bWVudHMucmVzdEJhc2UgPSB0aGlzLnN0YXRlLnRheG9ub21pZXNbdGhpcy5zdGF0ZS50YXhvbm9teV0ucmVzdF9iYXNlO1xuXG4gICAgICAgIHJldHVybiBhcGkuZ2V0VGVybXMocmVxdWVzdEFyZ3VtZW50cylcbiAgICAgICAgICAgIC50aGVuKHJlc3BvbnNlID0+IHtcbiAgICAgICAgICAgICAgICBpZiAocmVxdWVzdEFyZ3VtZW50cy5zZWFyY2gpIHtcbiAgICAgICAgICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgICAgICAgICBmaWx0ZXJUZXJtczogcmVzcG9uc2UuZmlsdGVyKCh7IGlkIH0pID0+IHNlbGVjdGVkVGVybUlkcy5pbmRleE9mKGlkKSA9PT0gLTEpLFxuICAgICAgICAgICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgICAgICAgICByZXR1cm4gcmVzcG9uc2U7XG4gICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgICAgIHRlcm1zOiB1bmlxdWVCeUlkKFsuLi50aGlzLnN0YXRlLnRlcm1zLCAuLi5yZXNwb25zZV0pLFxuICAgICAgICAgICAgICAgIH0pO1xuXG4gICAgICAgICAgICAgICAgLy8gcmV0dXJuIHJlc3BvbnNlIHRvIGNvbnRpbnVlIHRoZSBjaGFpblxuICAgICAgICAgICAgICAgIHJldHVybiByZXNwb25zZTtcbiAgICAgICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEdldHMgdGhlIHNlbGVjdGVkIHRlcm1zIGJ5IGlkIGZyb20gdGhlIGB0ZXJtc2Agc3RhdGUgb2JqZWN0IGFuZCBzb3J0cyB0aGVtIGJ5IHRoZWlyIHBvc2l0aW9uIGluIHRoZSBzZWxlY3RlZCBhcnJheS5cbiAgICAgKiBAcmV0dXJucyBBcnJheSBvZiBvYmplY3RzLlxuICAgICAqL1xuICAgIGdldFNlbGVjdGVkVGVybXMoKSB7XG4gICAgICAgIGNvbnN0IHsgc2VsZWN0ZWRUZXJtSWRzIH0gPSB0aGlzLnByb3BzO1xuICAgICAgICByZXR1cm4gdGhpcy5zdGF0ZS50ZXJtc1xuICAgICAgICAgICAgLmZpbHRlcigoeyBpZCB9KSA9PiBzZWxlY3RlZFRlcm1JZHMuaW5kZXhPZihpZCkgIT09IC0xKVxuICAgICAgICAgICAgLnNvcnQoKGEsIGIpID0+IHtcbiAgICAgICAgICAgICAgICBjb25zdCBhSW5kZXggPSB0aGlzLnByb3BzLnNlbGVjdGVkVGVybUlkcy5pbmRleE9mKGEuaWQpO1xuICAgICAgICAgICAgICAgIGNvbnN0IGJJbmRleCA9IHRoaXMucHJvcHMuc2VsZWN0ZWRUZXJtSWRzLmluZGV4T2YoYi5pZCk7XG5cbiAgICAgICAgICAgICAgICBpZiAoYUluZGV4ID4gYkluZGV4KSB7XG4gICAgICAgICAgICAgICAgICAgIHJldHVybiAxO1xuICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgIGlmIChhSW5kZXggPCBiSW5kZXgpIHtcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIC0xO1xuICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgIHJldHVybiAwO1xuICAgICAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogTWFrZXMgdGhlIG5lY2Vzc2FyeSBhcGkgY2FsbHMgdG8gZmV0Y2ggdGhlIHNlbGVjdGVkIHRlcm1zIGFuZCByZXR1cm5zIGEgcHJvbWlzZS5cbiAgICAgKiBAcmV0dXJucyB7Kn1cbiAgICAgKi9cbiAgICByZXRyaWV2ZVNlbGVjdGVkVGVybXMoKSB7XG4gICAgICAgIGNvbnN0IHsgdGVybVR5cGUsIHNlbGVjdGVkVGVybUlkcyB9ID0gdGhpcy5wcm9wcztcbiAgICAgICAgY29uc3QgeyB0YXhvbm9taWVzIH0gPSB0aGlzLnN0YXRlO1xuXG4gICAgICAgIGlmICggc2VsZWN0ZWRUZXJtSWRzICYmICFzZWxlY3RlZFRlcm1JZHMubGVuZ3RoID4gMCApIHtcbiAgICAgICAgICAgIC8vIHJldHVybiBhIGZha2UgcHJvbWlzZSB0aGF0IGF1dG8gcmVzb2x2ZXMuXG4gICAgICAgICAgICByZXR1cm4gbmV3IFByb21pc2UoKHJlc29sdmUpID0+IHJlc29sdmUoKSk7XG4gICAgICAgIH1cblxuICAgICAgICByZXR1cm4gdGhpcy5nZXRUZXJtcyh7XG4gICAgICAgICAgICBpbmNsdWRlOiB0aGlzLnByb3BzLnNlbGVjdGVkVGVybUlkcy5qb2luKCcsJyksXG4gICAgICAgICAgICBwZXJfcGFnZTogMTAwLFxuICAgICAgICAgICAgdGVybVR5cGVcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogQWRkcyBkZXNpcmVkIHRlcm0gaWQgdG8gdGhlIHNlbGVjdGVkVGVybUlkcyBMaXN0XG4gICAgICogQHBhcmFtIHtJbnRlZ2VyfSB0ZXJtX2lkXG4gICAgICovXG4gICAgYWRkVGVybSh0ZXJtX2lkKSB7XG4gICAgICAgIGlmICh0aGlzLnN0YXRlLmZpbHRlcikge1xuICAgICAgICAgICAgY29uc3QgdGVybSA9IHRoaXMuc3RhdGUuZmlsdGVyVGVybXMuZmlsdGVyKHAgPT4gcC5pZCA9PT0gdGVybV9pZCk7XG4gICAgICAgICAgICBjb25zdCB0ZXJtcyA9IHVuaXF1ZUJ5SWQoW1xuICAgICAgICAgICAgICAgIC4uLnRoaXMuc3RhdGUudGVybXMsXG4gICAgICAgICAgICAgICAgLi4udGVybVxuICAgICAgICAgICAgXSk7XG5cbiAgICAgICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgICAgIHRlcm1zXG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfVxuXG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2VsZWN0ZWRUZXJtSWRzKFtcbiAgICAgICAgICAgIC4uLnRoaXMucHJvcHMuc2VsZWN0ZWRUZXJtSWRzLFxuICAgICAgICAgICAgdGVybV9pZFxuICAgICAgICBdKTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBSZW1vdmVzIGRlc2lyZWQgdGVybSBpZCB0byB0aGUgc2VsZWN0ZWRUZXJtSWRzIExpc3RcbiAgICAgKiBAcGFyYW0ge0ludGVnZXJ9IHRlcm1faWRcbiAgICAgKi9cbiAgICByZW1vdmVUZXJtKHRlcm1faWQpIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTZWxlY3RlZFRlcm1JZHMoW1xuICAgICAgICAgICAgLi4udGhpcy5wcm9wcy5zZWxlY3RlZFRlcm1JZHNcbiAgICAgICAgXS5maWx0ZXIoaWQgPT4gaWQgIT09IHRlcm1faWQpKTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBIYW5kbGVzIHRoZSBzZWFyY2ggYm94IGlucHV0IHZhbHVlXG4gICAgICogQHBhcmFtIHN0cmluZyB0eXBlIC0gY29tZXMgZnJvbSB0aGUgZXZlbnQgb2JqZWN0IHRhcmdldC5cbiAgICAgKi9cbiAgICBoYW5kbGVJbnB1dEZpbHRlckNoYW5nZSh7IHRhcmdldDogeyB2YWx1ZTpmaWx0ZXIgPSAnJyB9ID0ge30gfSA9IHt9KSB7XG4gICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgZmlsdGVyXG4gICAgICAgIH0sICgpID0+IHtcbiAgICAgICAgICAgIGlmICghZmlsdGVyKSB7XG4gICAgICAgICAgICAgICAgLy8gcmVtb3ZlIGZpbHRlcmVkIHRlcm1zXG4gICAgICAgICAgICAgICAgcmV0dXJuIHRoaXMuc2V0U3RhdGUoeyBmaWx0ZXJlZFRlcm1zOiBbXSwgZmlsdGVyaW5nOiBmYWxzZSB9KTtcbiAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgdGhpcy5kb1Rlcm1GaWx0ZXIoKTtcbiAgICAgICAgfSlcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBBY3R1YWwgYXBpIGNhbGwgZm9yIHNlYXJjaGluZyBmb3IgcXVlcnksIHRoaXMgZnVuY3Rpb24gaXMgZGVib3VuY2VkIGluIGNvbnN0cnVjdG9yLlxuICAgICAqL1xuICAgIGRvVGVybUZpbHRlcigpIHtcbiAgICAgICAgY29uc3QgeyBmaWx0ZXIgPSAnJyB9ID0gdGhpcy5zdGF0ZTtcblxuICAgICAgICBpZiAoIWZpbHRlcikge1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG5cbiAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICBmaWx0ZXJpbmc6IHRydWUsXG4gICAgICAgICAgICBmaWx0ZXJMb2FkaW5nOiB0cnVlXG4gICAgICAgIH0pO1xuXG4gICAgICAgIHRoaXMuZ2V0VGVybXMoKVxuICAgICAgICAgICAgLnRoZW4oKCkgPT4ge1xuICAgICAgICAgICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgICAgICAgICBmaWx0ZXJMb2FkaW5nOiBmYWxzZVxuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogUmVuZGVycyB0aGUgVGVybVNlbGVjdG9yIGNvbXBvbmVudC5cbiAgICAgKi9cbiAgICByZW5kZXIoKSB7XG4gICAgICAgIGNvbnN0IHsgdGl0bGUgPSBfXygnU2VhcmNoIFRlcm0nLCAndm9kaScpIH0gPSB0aGlzLnByb3BzO1xuICAgICAgICBjb25zdCBpc0ZpbHRlcmVkID0gdGhpcy5zdGF0ZS5maWx0ZXJpbmc7XG4gICAgICAgIGNvbnN0IHRlcm1MaXN0ID0gaXNGaWx0ZXJlZCAmJiAhdGhpcy5zdGF0ZS5maWx0ZXJMb2FkaW5nID8gdGhpcy5zdGF0ZS5maWx0ZXJUZXJtcyA6IFtdO1xuICAgICAgICBjb25zdCBTZWxlY3RlZFRlcm1MaXN0ICA9IHRoaXMuZ2V0U2VsZWN0ZWRUZXJtcygpO1xuXG4gICAgICAgIGNvbnN0IGFkZEljb24gPSA8SWNvbiBpY29uPVwicGx1c1wiIC8+O1xuICAgICAgICBjb25zdCByZW1vdmVJY29uID0gPEljb24gaWNvbj1cIm1pbnVzXCIgLz47XG5cbiAgICAgICAgY29uc3Qgc2VhcmNoaW5wdXR1bmlxdWVJZCA9ICdzZWFyY2hpbnB1dC0nICsgTWF0aC5yYW5kb20oKS50b1N0cmluZygzNikuc3Vic3RyKDIsIDE2KTtcblxuICAgICAgICByZXR1cm4gKFxuICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjb21wb25lbnRzLWJhc2UtY29udHJvbCBjb21wb25lbnRzLXRlcm0tc2VsZWN0b3JcIj5cbiAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sX19maWVsZC0tc2VsZWN0ZWRcIj5cbiAgICAgICAgICAgICAgICAgICAgPGgyPnsgdGl0bGUgfTwvaDI+XG4gICAgICAgICAgICAgICAgICAgIDxJdGVtTGlzdFxuICAgICAgICAgICAgICAgICAgICAgICAgaXRlbXM9e1NlbGVjdGVkVGVybUxpc3R9XG4gICAgICAgICAgICAgICAgICAgICAgICBsb2FkaW5nPXt0aGlzLnN0YXRlLmluaXRpYWxMb2FkaW5nfVxuICAgICAgICAgICAgICAgICAgICAgICAgYWN0aW9uPXt0aGlzLnJlbW92ZVRlcm19XG4gICAgICAgICAgICAgICAgICAgICAgICBpY29uPXtyZW1vdmVJY29ufVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY29tcG9uZW50cy1iYXNlLWNvbnRyb2xfX2ZpZWxkXCI+XG4gICAgICAgICAgICAgICAgICAgIDxsYWJlbCBodG1sRm9yPXtzZWFyY2hpbnB1dHVuaXF1ZUlkfSBjbGFzc05hbWU9XCJjb21wb25lbnRzLWJhc2UtY29udHJvbF9fbGFiZWxcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgIDxJY29uIGljb249XCJzZWFyY2hcIiAvPlxuICAgICAgICAgICAgICAgICAgICA8L2xhYmVsPlxuICAgICAgICAgICAgICAgICAgICA8aW5wdXRcbiAgICAgICAgICAgICAgICAgICAgICAgIGNsYXNzTmFtZT1cImNvbXBvbmVudHMtdGV4dC1jb250cm9sX19pbnB1dFwiXG4gICAgICAgICAgICAgICAgICAgICAgICBpZD17c2VhcmNoaW5wdXR1bmlxdWVJZH1cbiAgICAgICAgICAgICAgICAgICAgICAgIHR5cGU9XCJzZWFyY2hcIlxuICAgICAgICAgICAgICAgICAgICAgICAgcGxhY2Vob2xkZXI9e19fKCdQbGVhc2UgZW50ZXIgeW91ciBzZWFyY2ggcXVlcnkuLi4nLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZT17dGhpcy5zdGF0ZS5maWx0ZXJ9XG4gICAgICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17dGhpcy5oYW5kbGVJbnB1dEZpbHRlckNoYW5nZX1cbiAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICAgICAgPEl0ZW1MaXN0XG4gICAgICAgICAgICAgICAgICAgICAgICBpdGVtcz17dGVybUxpc3R9XG4gICAgICAgICAgICAgICAgICAgICAgICBsb2FkaW5nPXt0aGlzLnN0YXRlLmluaXRpYWxMb2FkaW5nfHx0aGlzLnN0YXRlLmxvYWRpbmd8fHRoaXMuc3RhdGUuZmlsdGVyTG9hZGluZ31cbiAgICAgICAgICAgICAgICAgICAgICAgIGZpbHRlcmVkPXtpc0ZpbHRlcmVkfVxuICAgICAgICAgICAgICAgICAgICAgICAgYWN0aW9uPXt0aGlzLmFkZFRlcm19XG4gICAgICAgICAgICAgICAgICAgICAgICBpY29uPXthZGRJY29ufVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICk7XG4gICAgfVxufSIsImNvbnN0IHsgYXBpRmV0Y2ggfSA9IHdwO1xuXG4vKipcbiAqIE1ha2VzIGEgZ2V0IHJlcXVlc3QgdG8gdGhlIFBvc3RUeXBlcyBlbmRwb2ludC5cbiAqXG4gKiBAcmV0dXJucyB7UHJvbWlzZTxhbnk+fVxuICovXG5leHBvcnQgY29uc3QgZ2V0UG9zdFR5cGVzID0gKCkgPT4ge1xuICAgIHJldHVybiBhcGlGZXRjaCggeyBwYXRoOiAnL3dwL3YyL3R5cGVzJyB9ICk7XG59O1xuXG4vKipcbiAqIE1ha2VzIGEgZ2V0IHJlcXVlc3QgdG8gdGhlIGRlc2lyZWQgcG9zdCB0eXBlIGFuZCBidWlsZHMgdGhlIHF1ZXJ5IHN0cmluZyBiYXNlZCBvbiBhbiBvYmplY3QuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd8Ym9vbGVhbn0gcmVzdEJhc2UgLSByZXN0IGJhc2UgZm9yIHRoZSBxdWVyeS5cbiAqIEBwYXJhbSB7b2JqZWN0fSBhcmdzXG4gKiBAcmV0dXJucyB7UHJvbWlzZTxhbnk+fVxuICovXG5leHBvcnQgY29uc3QgZ2V0UG9zdHMgPSAoeyByZXN0QmFzZSA9IGZhbHNlLCAuLi5hcmdzIH0pID0+IHtcbiAgICBjb25zdCBxdWVyeVN0cmluZyA9IE9iamVjdC5rZXlzKGFyZ3MpLm1hcChhcmcgPT4gYCR7YXJnfT0ke2FyZ3NbYXJnXX1gKS5qb2luKCcmJyk7XG5cbiAgICBsZXQgcGF0aCA9IGAvd3AvdjIvJHtyZXN0QmFzZX0/JHtxdWVyeVN0cmluZ30mX2VtYmVkYDtcbiAgICByZXR1cm4gYXBpRmV0Y2goIHsgcGF0aDogcGF0aCB9ICk7XG59O1xuXG4vKipcbiAqIE1ha2VzIGEgZ2V0IHJlcXVlc3QgdG8gdGhlIFBvc3RUeXBlIFRheG9ub21pZXMgZW5kcG9pbnQuXG4gKlxuICogQHJldHVybnMge1Byb21pc2U8YW55Pn1cbiAqL1xuZXhwb3J0IGNvbnN0IGdldFRheG9ub21pZXMgPSAoeyAuLi5hcmdzIH0pID0+IHtcbiAgICBjb25zdCBxdWVyeVN0cmluZyA9IE9iamVjdC5rZXlzKGFyZ3MpLm1hcChhcmcgPT4gYCR7YXJnfT0ke2FyZ3NbYXJnXX1gKS5qb2luKCcmJyk7XG5cbiAgICBsZXQgcGF0aCA9IGAvd3AvdjIvdGF4b25vbWllcz8ke3F1ZXJ5U3RyaW5nfSZfZW1iZWRgO1xuICAgIHJldHVybiBhcGlGZXRjaCggeyBwYXRoOiBwYXRoIH0gKTtcbn07XG5cbi8qKlxuICogTWFrZXMgYSBnZXQgcmVxdWVzdCB0byB0aGUgZGVzaXJlZCBwb3N0IHR5cGUgYW5kIGJ1aWxkcyB0aGUgcXVlcnkgc3RyaW5nIGJhc2VkIG9uIGFuIG9iamVjdC5cbiAqXG4gKiBAcGFyYW0ge3N0cmluZ3xib29sZWFufSByZXN0QmFzZSAtIHJlc3QgYmFzZSBmb3IgdGhlIHF1ZXJ5LlxuICogQHBhcmFtIHtvYmplY3R9IGFyZ3NcbiAqIEByZXR1cm5zIHtQcm9taXNlPGFueT59XG4gKi9cbmV4cG9ydCBjb25zdCBnZXRUZXJtcyA9ICh7IHJlc3RCYXNlID0gZmFsc2UsIC4uLmFyZ3MgfSkgPT4ge1xuICAgIGNvbnN0IHF1ZXJ5U3RyaW5nID0gT2JqZWN0LmtleXMoYXJncykubWFwKGFyZyA9PiBgJHthcmd9PSR7YXJnc1thcmddfWApLmpvaW4oJyYnKTtcblxuICAgIGxldCBwYXRoID0gYC93cC92Mi8ke3Jlc3RCYXNlfT8ke3F1ZXJ5U3RyaW5nfSZfZW1iZWRgO1xuICAgIHJldHVybiBhcGlGZXRjaCggeyBwYXRoOiBwYXRoIH0gKTtcbn07IiwiLyoqXG4gKiBSZXR1cm5zIGEgdW5pcXVlIGFycmF5IG9mIG9iamVjdHMgYmFzZWQgb24gYSBkZXNpcmVkIGtleS5cbiAqIEBwYXJhbSB7YXJyYXl9IGFyciAtIGFycmF5IG9mIG9iamVjdHMuXG4gKiBAcGFyYW0ge3N0cmluZ3xpbnR9IGtleSAtIGtleSB0byBmaWx0ZXIgb2JqZWN0cyBieVxuICovXG5leHBvcnQgY29uc3QgdW5pcXVlQnkgPSAoYXJyLCBrZXkpID0+IHtcbiAgICBsZXQga2V5cyA9IFtdO1xuICAgIHJldHVybiBhcnIuZmlsdGVyKGl0ZW0gPT4ge1xuICAgICAgICBpZiAoa2V5cy5pbmRleE9mKGl0ZW1ba2V5XSkgIT09IC0xKSB7XG4gICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgIH1cblxuICAgICAgICByZXR1cm4ga2V5cy5wdXNoKGl0ZW1ba2V5XSk7XG4gICAgfSk7XG59O1xuXG4vKipcbiAqIFJldHVybnMgYSB1bmlxdWUgYXJyYXkgb2Ygb2JqZWN0cyBiYXNlZCBvbiB0aGUgaWQgcHJvcGVydHkuXG4gKiBAcGFyYW0ge2FycmF5fSBhcnIgLSBhcnJheSBvZiBvYmplY3RzIHRvIGZpbHRlci5cbiAqIEByZXR1cm5zIHsqfVxuICovXG5leHBvcnQgY29uc3QgdW5pcXVlQnlJZCA9IGFyciA9PiB1bmlxdWVCeShhcnIsICdpZCcpO1xuXG4vKipcbiAqIERlYm91bmNlIGEgZnVuY3Rpb24gYnkgbGltaXRpbmcgaG93IG9mdGVuIGl0IGNhbiBydW4uXG4gKiBAcGFyYW0ge2Z1bmN0aW9ufSBmdW5jIC0gY2FsbGJhY2sgZnVuY3Rpb25cbiAqIEBwYXJhbSB7SW50ZWdlcn0gd2FpdCAtIFRpbWUgaW4gbWlsbGlzZWNvbmRzIGhvdyBsb25nIGl0IHNob3VsZCB3YWl0LlxuICogQHJldHVybnMge0Z1bmN0aW9ufVxuICovXG5leHBvcnQgY29uc3QgZGVib3VuY2UgPSAoZnVuYywgd2FpdCkgPT4ge1xuICAgIGxldCB0aW1lb3V0ID0gbnVsbDtcblxuICAgIHJldHVybiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNvbnN0IGNvbnRleHQgPSB0aGlzO1xuICAgICAgICBjb25zdCBhcmdzID0gYXJndW1lbnRzO1xuXG4gICAgICAgIGNvbnN0IGxhdGVyID0gKCkgPT4ge1xuICAgICAgICAgICAgZnVuYy5hcHBseShjb250ZXh0LCBhcmdzKTtcbiAgICAgICAgfTtcblxuICAgICAgICBjbGVhclRpbWVvdXQodGltZW91dCk7XG4gICAgICAgIHRpbWVvdXQgPSBzZXRUaW1lb3V0KGxhdGVyLCB3YWl0KTtcbiAgICB9XG59OyJdfQ==
