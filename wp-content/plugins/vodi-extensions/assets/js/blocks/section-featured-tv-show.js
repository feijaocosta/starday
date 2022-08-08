(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

var _PostSelector = require("../components/PostSelector");

var _ImageUpload = require("../components/ImageUpload");

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
  CheckboxControl
} = wp.components;
registerBlockType('vodi/section-featured-tv-show', {
  title: __('Featured TV Show', 'vodi-extensions'),
  icon: 'welcome-view-site',
  category: 'vodi-blocks',
  edit: props => {
    const {
      attributes,
      setAttributes
    } = props;
    const {
      tv_show_id,
      bg_image,
      bg_light,
      design_options
    } = attributes;

    const onChangeTvShowId = newIds => {
      setAttributes({
        tv_show_id: newIds.join(',')
      });
    };

    const onChangeBgImage = media => {
      setAttributes({
        bg_image: media.id
      });
    };

    const onChangeBgLight = newBgLight => {
      setAttributes({
        bg_light: newBgLight
      });
    };

    const onChangeDesignOptions = newDesignOptions => {
      setAttributes({
        design_options: { ...design_options,
          ...newDesignOptions
        }
      });
    };

    return wp.element.createElement(Fragment, null, wp.element.createElement(InspectorControls, null, wp.element.createElement(_PostSelector.PostSelector, {
      postType: "tv_show",
      selectSingle: true,
      selectedPostIds: tv_show_id,
      updateSelectedPostIds: onChangeTvShowId
    }), wp.element.createElement(_ImageUpload.ImageUpload, {
      addImageLabel: __('Pick an Background Image', 'vodi-extensions'),
      replaceImageLabel: __('Replace Background Image', 'vodi-extensions'),
      removeImageLabel: __('Remove Background Image', 'vodi-extensions'),
      value: bg_image,
      onSelect: onChangeBgImage
    }), wp.element.createElement(CheckboxControl, {
      label: __('Is Light Background', 'vodi-extensions'),
      help: __('Check to change the text color dark.', 'vodi-extensions'),
      checked: bg_light,
      onChange: onChangeBgLight
    }), wp.element.createElement(PanelBody, {
      title: __('Design Options', 'vodi-extensions'),
      initialOpen: false
    }, wp.element.createElement(_DesignOptions.DesignOptions, {
      attributes: { ...design_options
      },
      updateDesignOptions: onChangeDesignOptions
    }))), wp.element.createElement(Disabled, null, tv_show_id && bg_image ? wp.element.createElement(ServerSideRender, {
      block: "vodi/section-featured-tv-show",
      attributes: attributes
    }) : tv_show_id && !bg_image ? __('Choose a Background Image', 'vodi-extensions') : __('Choose a TV Show', 'vodi-extensions')));
  },

  save() {
    // Rendering in PHP
    return null;
  }

});

},{"../components/DesignOptions":2,"../components/ImageUpload":3,"../components/PostSelector":6}],2:[function(require,module,exports){
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

},{}],3:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.ImageUpload = void 0;
const {
  __
} = wp.i18n;
const {
  MediaUpload
} = wp.editor;
const {
  Fragment,
  Component
} = wp.element;
const {
  Button
} = wp.components;
/**
 * ImageUpload Component
 */

class ImageUpload extends Component {
  /**
   * Constructor for ImageUpload Component.
   * Sets up state, and creates bindings for functions.
   * @param object props - current component properties.
   */
  constructor(props) {
    super(...arguments);
    this.props = props;
    this.onChangeImage = this.onChangeImage.bind(this);
    this.onRemoveImage = this.onRemoveImage.bind(this);
  }

  onChangeImage(media) {
    this.props.onSelect(media);
  }

  onRemoveImage() {
    this.props.onSelect(0);
  }
  /**
   * Renders the ImageUpload component.
   */


  render() {
    const {
      attributes,
      addImageLabel,
      replaceImageLabel,
      removeImageLabel,
      value
    } = this.props;
    return wp.element.createElement("div", {
      className: "components-base-control components-image-upload"
    }, wp.element.createElement("div", {
      className: "components-base-control__field"
    }, wp.element.createElement(MediaUpload, {
      onSelect: this.onChangeImage,
      type: "image",
      value: value,
      render: _ref => {
        let {
          open
        } = _ref;
        return wp.element.createElement("div", {
          className: "button-container"
        }, wp.element.createElement(Button, {
          isSecondary: true,
          isLarge: true,
          onClick: open,
          style: {
            marginBottom: '.5rem'
          }
        }, value ? replaceImageLabel : addImageLabel));
      }
    })), value ? wp.element.createElement("div", {
      className: "components-base-control__field"
    }, wp.element.createElement("div", {
      className: "button-container"
    }, wp.element.createElement(Button, {
      isSecondary: true,
      isLarge: true,
      onClick: this.onRemoveImage,
      style: {
        marginBottom: '.5rem'
      }
    }, removeImageLabel))) : '');
  }

}

exports.ImageUpload = ImageUpload;

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

},{"../utils/api":7,"../utils/useful-funcs":8,"./ItemList":5}],7:[function(require,module,exports){
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

},{}],8:[function(require,module,exports){
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9ibG9ja3Mvc2VjdGlvbi1mZWF0dXJlZC10di1zaG93LmpzIiwic3JjL3BsdWdpbnMvdm9kaS1leHRlbnNpb25zL2Fzc2V0cy9lc25leHQvY29tcG9uZW50cy9EZXNpZ25PcHRpb25zLmpzIiwic3JjL3BsdWdpbnMvdm9kaS1leHRlbnNpb25zL2Fzc2V0cy9lc25leHQvY29tcG9uZW50cy9JbWFnZVVwbG9hZC5qcyIsInNyYy9wbHVnaW5zL3ZvZGktZXh0ZW5zaW9ucy9hc3NldHMvZXNuZXh0L2NvbXBvbmVudHMvSXRlbS5qcyIsInNyYy9wbHVnaW5zL3ZvZGktZXh0ZW5zaW9ucy9hc3NldHMvZXNuZXh0L2NvbXBvbmVudHMvSXRlbUxpc3QuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9jb21wb25lbnRzL1Bvc3RTZWxlY3Rvci5qcyIsInNyYy9wbHVnaW5zL3ZvZGktZXh0ZW5zaW9ucy9hc3NldHMvZXNuZXh0L3V0aWxzL2FwaS5qcyIsInNyYy9wbHVnaW5zL3ZvZGktZXh0ZW5zaW9ucy9hc3NldHMvZXNuZXh0L3V0aWxzL3VzZWZ1bC1mdW5jcy5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTs7O0FDQUE7O0FBQ0E7O0FBQ0E7O0FBRUEsTUFBTTtBQUFFLEVBQUE7QUFBRixJQUFTLEVBQUUsQ0FBQyxJQUFsQjtBQUNBLE1BQU07QUFBRSxFQUFBO0FBQUYsSUFBd0IsRUFBRSxDQUFDLE1BQWpDO0FBQ0EsTUFBTTtBQUFFLEVBQUE7QUFBRixJQUF3QixFQUFFLENBQUMsTUFBakM7QUFDQSxNQUFNO0FBQUUsRUFBQTtBQUFGLElBQWUsRUFBRSxDQUFDLE9BQXhCO0FBQ0EsTUFBTTtBQUFFLEVBQUEsZ0JBQUY7QUFBb0IsRUFBQSxRQUFwQjtBQUE4QixFQUFBLFNB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cmNlUm9vdCI6IiIsInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbigpe2Z1bmN0aW9uIHIoZSxuLHQpe2Z1bmN0aW9uIG8oaSxmKXtpZighbltpXSl7aWYoIWVbaV0pe3ZhciBjPVwiZnVuY3Rpb25cIj09dHlwZW9mIHJlcXVpcmUmJnJlcXVpcmU7aWYoIWYmJmMpcmV0dXJuIGMoaSwhMCk7aWYodSlyZXR1cm4gdShpLCEwKTt2YXIgYT1uZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK2krXCInXCIpO3Rocm93IGEuY29kZT1cIk1PRFVMRV9OT1RfRk9VTkRcIixhfXZhciBwPW5baV09e2V4cG9ydHM6e319O2VbaV1bMF0uY2FsbChwLmV4cG9ydHMsZnVuY3Rpb24ocil7dmFyIG49ZVtpXVsxXVtyXTtyZXR1cm4gbyhufHxyKX0scCxwLmV4cG9ydHMscixlLG4sdCl9cmV0dXJuIG5baV0uZXhwb3J0c31mb3IodmFyIHU9XCJmdW5jdGlvblwiPT10eXBlb2YgcmVxdWlyZSYmcmVxdWlyZSxpPTA7aTx0Lmxlbmd0aDtpKyspbyh0W2ldKTtyZXR1cm4gb31yZXR1cm4gcn0pKCkiLCJpbXBvcnQgeyBQb3N0U2VsZWN0b3IgfSBmcm9tICcuLi9jb21wb25lbnRzL1Bvc3RTZWxlY3Rvcic7XG5pbXBvcnQgeyBJbWFnZVVwbG9hZCB9IGZyb20gJy4uL2NvbXBvbmVudHMvSW1hZ2VVcGxvYWQnO1xuaW1wb3J0IHsgRGVzaWduT3B0aW9ucyB9IGZyb20gJy4uL2NvbXBvbmVudHMvRGVzaWduT3B0aW9ucyc7XG5cbmNvbnN0IHsgX18gfSA9IHdwLmkxOG47XG5jb25zdCB7IHJlZ2lzdGVyQmxvY2tUeXBlIH0gPSB3cC5ibG9ja3M7XG5jb25zdCB7IEluc3BlY3RvckNvbnRyb2xzIH0gPSB3cC5lZGl0b3I7XG5jb25zdCB7IEZyYWdtZW50IH0gPSB3cC5lbGVtZW50O1xuY29uc3QgeyBTZXJ2ZXJTaWRlUmVuZGVyLCBEaXNhYmxlZCwgUGFuZWxCb2R5LCBDaGVja2JveENvbnRyb2wgfSA9IHdwLmNvbXBvbmVudHM7XG5cbnJlZ2lzdGVyQmxvY2tUeXBlKCAndm9kaS9zZWN0aW9uLWZlYXR1cmVkLXR2LXNob3cnLCB7XG4gICAgdGl0bGU6IF9fKCdGZWF0dXJlZCBUViBTaG93JywgJ3ZvZGktZXh0ZW5zaW9ucycpLFxuXG4gICAgaWNvbjogJ3dlbGNvbWUtdmlldy1zaXRlJyxcblxuICAgIGNhdGVnb3J5OiAndm9kaS1ibG9ja3MnLFxuXG4gICAgZWRpdDogKCAoIHByb3BzICkgPT4ge1xuICAgICAgICBjb25zdCB7IGF0dHJpYnV0ZXMsIHNldEF0dHJpYnV0ZXMgfSA9IHByb3BzO1xuICAgICAgICBjb25zdCB7IHR2X3Nob3dfaWQsIGJnX2ltYWdlLCBiZ19saWdodCwgZGVzaWduX29wdGlvbnMgfSA9IGF0dHJpYnV0ZXM7XG5cbiAgICAgICAgY29uc3Qgb25DaGFuZ2VUdlNob3dJZCA9IG5ld0lkcyA9PiB7XG4gICAgICAgICAgICBzZXRBdHRyaWJ1dGVzKCB7IHR2X3Nob3dfaWQ6IG5ld0lkcy5qb2luKCcsJykgfSApO1xuICAgICAgICB9O1xuXG4gICAgICAgIGNvbnN0IG9uQ2hhbmdlQmdJbWFnZSA9IG1lZGlhID0+IHtcbiAgICAgICAgICAgIHNldEF0dHJpYnV0ZXMoIHsgYmdfaW1hZ2U6IG1lZGlhLmlkIH0gKTtcbiAgICAgICAgfTtcbiAgICAgICAgXG4gICAgICAgIGNvbnN0IG9uQ2hhbmdlQmdMaWdodCA9IG5ld0JnTGlnaHQgPT4ge1xuICAgICAgICAgICAgc2V0QXR0cmlidXRlcyggeyBiZ19saWdodDogbmV3QmdMaWdodCB9ICk7XG4gICAgICAgIH07XG5cbiAgICAgICAgY29uc3Qgb25DaGFuZ2VEZXNpZ25PcHRpb25zID0gbmV3RGVzaWduT3B0aW9ucyA9PiB7XG4gICAgICAgICAgICBzZXRBdHRyaWJ1dGVzKCB7IGRlc2lnbl9vcHRpb25zOiB7IC4uLmRlc2lnbl9vcHRpb25zLCAuLi5uZXdEZXNpZ25PcHRpb25zIH0gfSApO1xuICAgICAgICB9O1xuXG4gICAgICAgIHJldHVybiAoXG4gICAgICAgICAgICA8RnJhZ21lbnQ+XG4gICAgICAgICAgICAgICAgPEluc3BlY3RvckNvbnRyb2xzPlxuICAgICAgICAgICAgICAgICAgICA8UG9zdFNlbGVjdG9yXG4gICAgICAgICAgICAgICAgICAgICAgICBwb3N0VHlwZSA9ICd0dl9zaG93J1xuICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0U2luZ2xlID0geyB0cnVlIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIHNlbGVjdGVkUG9zdElkcz17IHR2X3Nob3dfaWQgfVxuICAgICAgICAgICAgICAgICAgICAgICAgdXBkYXRlU2VsZWN0ZWRQb3N0SWRzPXsgb25DaGFuZ2VUdlNob3dJZCB9XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgIDxJbWFnZVVwbG9hZFxuICAgICAgICAgICAgICAgICAgICAgICAgYWRkSW1hZ2VMYWJlbD17IF9fKCdQaWNrIGFuIEJhY2tncm91bmQgSW1hZ2UnLCAndm9kaS1leHRlbnNpb25zJykgfVxuICAgICAgICAgICAgICAgICAgICAgICAgcmVwbGFjZUltYWdlTGFiZWw9eyBfXygnUmVwbGFjZSBCYWNrZ3JvdW5kIEltYWdlJywgJ3ZvZGktZXh0ZW5zaW9ucycpIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIHJlbW92ZUltYWdlTGFiZWw9eyBfXygnUmVtb3ZlIEJhY2tncm91bmQgSW1hZ2UnLCAndm9kaS1leHRlbnNpb25zJykgfVxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBiZ19pbWFnZSB9XG4gICAgICAgICAgICAgICAgICAgICAgICBvblNlbGVjdD17IG9uQ2hhbmdlQmdJbWFnZSB9XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgIDxDaGVja2JveENvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnSXMgTGlnaHQgQmFja2dyb3VuZCcsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgICAgIGhlbHA9e19fKCdDaGVjayB0byBjaGFuZ2UgdGhlIHRleHQgY29sb3IgZGFyay4nLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgICAgICBjaGVja2VkPXsgYmdfbGlnaHQgfVxuICAgICAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyBvbkNoYW5nZUJnTGlnaHQgfVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICA8UGFuZWxCb2R5XG4gICAgICAgICAgICAgICAgICAgICAgICB0aXRsZT17X18oJ0Rlc2lnbiBPcHRpb25zJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgaW5pdGlhbE9wZW49eyBmYWxzZSB9XG4gICAgICAgICAgICAgICAgICAgID5cbiAgICAgICAgICAgICAgICAgICAgICAgIDxEZXNpZ25PcHRpb25zXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYXR0cmlidXRlcyA9IHsgeyAuLi5kZXNpZ25fb3B0aW9ucyB9IH1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB1cGRhdGVEZXNpZ25PcHRpb25zID0geyBvbkNoYW5nZURlc2lnbk9wdGlvbnMgfVxuICAgICAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICAgICAgPC9QYW5lbEJvZHk+XG4gICAgICAgICAgICAgICAgPC9JbnNwZWN0b3JDb250cm9scz5cbiAgICAgICAgICAgICAgICA8RGlzYWJsZWQ+XG4gICAgICAgICAgICAgICAgICAgIHsgKCB0dl9zaG93X2lkICYmIGJnX2ltYWdlICkgPyAoXG4gICAgICAgICAgICAgICAgICAgICAgICA8U2VydmVyU2lkZVJlbmRlclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGJsb2NrPVwidm9kaS9zZWN0aW9uLWZlYXR1cmVkLXR2LXNob3dcIlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGF0dHJpYnV0ZXM9eyBhdHRyaWJ1dGVzIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgICkgOiAoIHR2X3Nob3dfaWQgJiYgISBiZ19pbWFnZSA/IF9fKCdDaG9vc2UgYSBCYWNrZ3JvdW5kIEltYWdlJywgJ3ZvZGktZXh0ZW5zaW9ucycpIDogX18oJ0Nob29zZSBhIFRWIFNob3cnLCAndm9kaS1leHRlbnNpb25zJykgKSB9XG4gICAgICAgICAgICAgICAgICAgIFxuICAgICAgICAgICAgICAgIDwvRGlzYWJsZWQ+XG4gICAgICAgICAgICA8L0ZyYWdtZW50PlxuICAgICAgICApO1xuICAgIH0gKSxcblxuICAgIHNhdmUoKSB7XG4gICAgICAgIC8vIFJlbmRlcmluZyBpbiBQSFBcbiAgICAgICAgcmV0dXJuIG51bGw7XG4gICAgfSxcbn0gKTsiLCJjb25zdCB7IF9fIH0gPSB3cC5pMThuO1xuY29uc3QgeyBDb21wb25lbnQgfSA9IHdwLmVsZW1lbnQ7XG5jb25zdCB7IFJhbmdlQ29udHJvbCB9ID0gd3AuY29tcG9uZW50cztcblxuLyoqXG4gKiBEZXNpZ25PcHRpb25zIENvbXBvbmVudFxuICovXG5leHBvcnQgY2xhc3MgRGVzaWduT3B0aW9ucyBleHRlbmRzIENvbXBvbmVudCB7XG4gICAgLyoqXG4gICAgICogQ29uc3RydWN0b3IgZm9yIERlc2lnbk9wdGlvbnMgQ29tcG9uZW50LlxuICAgICAqIFNldHMgdXAgc3RhdGUsIGFuZCBjcmVhdGVzIGJpbmRpbmdzIGZvciBmdW5jdGlvbnMuXG4gICAgICogQHBhcmFtIG9iamVjdCBwcm9wcyAtIGN1cnJlbnQgY29tcG9uZW50IHByb3BlcnRpZXMuXG4gICAgICovXG4gICAgY29uc3RydWN0b3IocHJvcHMpIHtcbiAgICAgICAgc3VwZXIoLi4uYXJndW1lbnRzKTtcbiAgICAgICAgdGhpcy5wcm9wcyA9IHByb3BzO1xuXG4gICAgICAgIHRoaXMub25DaGFuZ2VQYWRkaW5nVG9wID0gdGhpcy5vbkNoYW5nZVBhZGRpbmdUb3AuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZVBhZGRpbmdCb3R0b20gPSB0aGlzLm9uQ2hhbmdlUGFkZGluZ0JvdHRvbS5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlUGFkZGluZ0xlZnQgPSB0aGlzLm9uQ2hhbmdlUGFkZGluZ0xlZnQuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZVBhZGRpbmdSaWdodCA9IHRoaXMub25DaGFuZ2VQYWRkaW5nUmlnaHQuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZU1hcmdpblRvcCA9IHRoaXMub25DaGFuZ2VNYXJnaW5Ub3AuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZU1hcmdpbkJvdHRvbSA9IHRoaXMub25DaGFuZ2VNYXJnaW5Cb3R0b20uYmluZCh0aGlzKTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZVBhZGRpbmdUb3AoIG5ld29uQ2hhbmdlUGFkZGluZ1RvcCApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVEZXNpZ25PcHRpb25zKHtcbiAgICAgICAgICAgIHBhZGRpbmdfdG9wOiBuZXdvbkNoYW5nZVBhZGRpbmdUb3BcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VQYWRkaW5nQm90dG9tKCBuZXdvbkNoYW5nZVBhZGRpbmdCb3R0b20gKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlRGVzaWduT3B0aW9ucyh7XG4gICAgICAgICAgICBwYWRkaW5nX2JvdHRvbTogbmV3b25DaGFuZ2VQYWRkaW5nQm90dG9tXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlUGFkZGluZ0xlZnQoIG5ld29uQ2hhbmdlUGFkZGluZ0xlZnQgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlRGVzaWduT3B0aW9ucyh7XG4gICAgICAgICAgICBwYWRkaW5nX2xlZnQ6IG5ld29uQ2hhbmdlUGFkZGluZ0xlZnRcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VQYWRkaW5nUmlnaHQoIG5ld29uQ2hhbmdlUGFkZGluZ1JpZ2h0ICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZURlc2lnbk9wdGlvbnMoe1xuICAgICAgICAgICAgcGFkZGluZ19yaWdodDogbmV3b25DaGFuZ2VQYWRkaW5nUmlnaHRcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VNYXJnaW5Ub3AoIG5ld29uQ2hhbmdlTWFyZ2luVG9wICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZURlc2lnbk9wdGlvbnMoe1xuICAgICAgICAgICAgbWFyZ2luX3RvcDogbmV3b25DaGFuZ2VNYXJnaW5Ub3BcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VNYXJnaW5Cb3R0b20oIG5ld29uQ2hhbmdlTWFyZ2luQm90dG9tICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZURlc2lnbk9wdGlvbnMoe1xuICAgICAgICAgICAgbWFyZ2luX2JvdHRvbTogbmV3b25DaGFuZ2VNYXJnaW5Cb3R0b21cbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogUmVuZGVycyB0aGUgRGVzaWduT3B0aW9ucyBjb21wb25lbnQuXG4gICAgICovXG4gICAgcmVuZGVyKCkge1xuICAgICAgICBjb25zdCB7IGF0dHJpYnV0ZXMgfSA9IHRoaXMucHJvcHM7XG4gICAgICAgIGNvbnN0IHsgcGFkZGluZ190b3AsIHBhZGRpbmdfYm90dG9tLCBwYWRkaW5nX2xlZnQsIHBhZGRpbmdfcmlnaHQsIG1hcmdpbl90b3AsIG1hcmdpbl9ib3R0b20gfSA9IGF0dHJpYnV0ZXM7XG5cbiAgICAgICAgcmV0dXJuIChcbiAgICAgICAgICAgIDxkaXY+XG4gICAgICAgICAgICAgICAgPFJhbmdlQ29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ1BhZGRpbmcgVG9wIChweCknLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgcGFkZGluZ190b3AgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VQYWRkaW5nVG9wIH1cbiAgICAgICAgICAgICAgICAgICAgbWluPXsgMCB9XG4gICAgICAgICAgICAgICAgICAgIG1heD17IDEwMCB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8UmFuZ2VDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnUGFkZGluZyBCb3R0b20gKHB4KScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBwYWRkaW5nX2JvdHRvbSB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZVBhZGRpbmdCb3R0b20gfVxuICAgICAgICAgICAgICAgICAgICBtaW49eyAwIH1cbiAgICAgICAgICAgICAgICAgICAgbWF4PXsgMTAwIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDxSYW5nZUNvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdQYWRkaW5nIExlZnQgKHB4KScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBwYWRkaW5nX2xlZnQgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VQYWRkaW5nTGVmdCB9XG4gICAgICAgICAgICAgICAgICAgIG1pbj17IDAgfVxuICAgICAgICAgICAgICAgICAgICBtYXg9eyAxMDAgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPFJhbmdlQ29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ1BhZGRpbmcgUmlnaHQgKHB4KScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBwYWRkaW5nX3JpZ2h0IH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlUGFkZGluZ1JpZ2h0IH1cbiAgICAgICAgICAgICAgICAgICAgbWluPXsgMCB9XG4gICAgICAgICAgICAgICAgICAgIG1heD17IDEwMCB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8UmFuZ2VDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnTWFyZ2luIFRvcCAocHgpJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IG1hcmdpbl90b3AgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VNYXJnaW5Ub3AgfVxuICAgICAgICAgICAgICAgICAgICBtaW49eyAtMTAwIH1cbiAgICAgICAgICAgICAgICAgICAgbWF4PXsgMTAwIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDxSYW5nZUNvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdNYXJnaW4gQm90dG9tIChweCknLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgbWFyZ2luX2JvdHRvbSB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZU1hcmdpbkJvdHRvbSB9XG4gICAgICAgICAgICAgICAgICAgIG1pbj17IC0xMDAgfVxuICAgICAgICAgICAgICAgICAgICBtYXg9eyAxMDAgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgKTtcbiAgICB9XG59IiwiY29uc3QgeyBfXyB9ID0gd3AuaTE4bjtcbmNvbnN0IHsgTWVkaWFVcGxvYWQgfSA9IHdwLmVkaXRvcjtcbmNvbnN0IHsgRnJhZ21lbnQsIENvbXBvbmVudCB9ID0gd3AuZWxlbWVudDtcbmNvbnN0IHsgQnV0dG9uIH0gPSB3cC5jb21wb25lbnRzO1xuXG4vKipcbiAqIEltYWdlVXBsb2FkIENvbXBvbmVudFxuICovXG5leHBvcnQgY2xhc3MgSW1hZ2VVcGxvYWQgZXh0ZW5kcyBDb21wb25lbnQge1xuICAgIC8qKlxuICAgICAqIENvbnN0cnVjdG9yIGZvciBJbWFnZVVwbG9hZCBDb21wb25lbnQuXG4gICAgICogU2V0cyB1cCBzdGF0ZSwgYW5kIGNyZWF0ZXMgYmluZGluZ3MgZm9yIGZ1bmN0aW9ucy5cbiAgICAgKiBAcGFyYW0gb2JqZWN0IHByb3BzIC0gY3VycmVudCBjb21wb25lbnQgcHJvcGVydGllcy5cbiAgICAgKi9cbiAgICBjb25zdHJ1Y3Rvcihwcm9wcykge1xuICAgICAgICBzdXBlciguLi5hcmd1bWVudHMpO1xuICAgICAgICB0aGlzLnByb3BzID0gcHJvcHM7XG5cbiAgICAgICAgdGhpcy5vbkNoYW5nZUltYWdlID0gdGhpcy5vbkNoYW5nZUltYWdlLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25SZW1vdmVJbWFnZSA9IHRoaXMub25SZW1vdmVJbWFnZS5iaW5kKHRoaXMpO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlSW1hZ2UoIG1lZGlhICkge1xuICAgICAgICB0aGlzLnByb3BzLm9uU2VsZWN0KCBtZWRpYSApO1xuICAgIH1cblxuICAgIG9uUmVtb3ZlSW1hZ2UoKSB7XG4gICAgICAgIHRoaXMucHJvcHMub25TZWxlY3QoIDAgKTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBSZW5kZXJzIHRoZSBJbWFnZVVwbG9hZCBjb21wb25lbnQuXG4gICAgICovXG4gICAgcmVuZGVyKCkge1xuICAgICAgICBjb25zdCB7IGF0dHJpYnV0ZXMsIGFkZEltYWdlTGFiZWwsIHJlcGxhY2VJbWFnZUxhYmVsLCByZW1vdmVJbWFnZUxhYmVsLCB2YWx1ZSB9ID0gdGhpcy5wcm9wcztcblxuICAgICAgICByZXR1cm4gKFxuICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjb21wb25lbnRzLWJhc2UtY29udHJvbCBjb21wb25lbnRzLWltYWdlLXVwbG9hZFwiPlxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY29tcG9uZW50cy1iYXNlLWNvbnRyb2xfX2ZpZWxkXCI+XG4gICAgICAgICAgICAgICAgICAgIDxNZWRpYVVwbG9hZFxuICAgICAgICAgICAgICAgICAgICAgICAgb25TZWxlY3Q9eyB0aGlzLm9uQ2hhbmdlSW1hZ2UgfVxuICAgICAgICAgICAgICAgICAgICAgICAgdHlwZT1cImltYWdlXCJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgdmFsdWUgfVxuICAgICAgICAgICAgICAgICAgICAgICAgcmVuZGVyPXsgKCB7IG9wZW4gfSApID0+IChcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImJ1dHRvbi1jb250YWluZXJcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPEJ1dHRvbiBpc1NlY29uZGFyeSBpc0xhcmdlIG9uQ2xpY2s9eyBvcGVuIH0gc3R5bGU9e3ttYXJnaW5Cb3R0b206ICcuNXJlbSd9fT5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHsgKCB2YWx1ZSApID8gcmVwbGFjZUltYWdlTGFiZWwgOiBhZGRJbWFnZUxhYmVsIH1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9CdXR0b24+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgICAgICAgICApIH1cbiAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICB7ICggdmFsdWUgKSA/IChcbiAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjb21wb25lbnRzLWJhc2UtY29udHJvbF9fZmllbGRcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiYnV0dG9uLWNvbnRhaW5lclwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxCdXR0b24gaXNTZWNvbmRhcnkgaXNMYXJnZSBvbkNsaWNrPXsgdGhpcy5vblJlbW92ZUltYWdlIH0gc3R5bGU9e3ttYXJnaW5Cb3R0b206ICcuNXJlbSd9fT5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgeyByZW1vdmVJbWFnZUxhYmVsIH1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L0J1dHRvbj5cbiAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICApIDogJycgfVxuICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICk7XG4gICAgfVxufSIsIlxuLyoqXG4gKiBJdGVtIENvbXBvbmVudC5cbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gaXRlbVRpdGxlIC0gQ3VycmVudCBpdGVtIHRpdGxlLlxuICogQHBhcmFtIHtmdW5jdGlvbn0gY2xpY2tIYW5kbGVyIC0gdGhpcyBpcyB0aGUgaGFuZGxpbmcgZnVuY3Rpb24gZm9yIHRoZSBhZGQvcmVtb3ZlIGZ1bmN0aW9uXG4gKiBAcGFyYW0ge0ludGVnZXJ9IGl0ZW1JZCAtIEN1cnJlbnQgaXRlbSBJRFxuICogQHBhcmFtIGljb25cbiAqIEByZXR1cm5zIHsqfSBJdGVtIEhUTUwuXG4gKi9cbmV4cG9ydCBjb25zdCBJdGVtID0gKHsgdGl0bGU6IHsgcmVuZGVyZWQ6IGl0ZW1UaXRsZSB9ID0ge30sIG5hbWUsIGNsaWNrSGFuZGxlciwgaWQ6IGl0ZW1JZCwgaWNvbiB9KSA9PiAoXG4gICAgPGFydGljbGUgY2xhc3NOYW1lPVwiaXRlbVwiPlxuICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cIml0ZW0tYm9keVwiPlxuICAgICAgICAgICAgPGgzIGNsYXNzTmFtZT1cIml0ZW0tdGl0bGVcIiBzdHlsZT17e21hcmdpblRvcDogJzAnfX0+e2l0ZW1UaXRsZX17bmFtZX08L2gzPlxuICAgICAgICA8L2Rpdj5cbiAgICAgICAgPGJ1dHRvbiBvbkNsaWNrPXsoKSA9PiBjbGlja0hhbmRsZXIoaXRlbUlkKX0+e2ljb259PC9idXR0b24+XG4gICAgPC9hcnRpY2xlPlxuKTsiLCJpbXBvcnQgeyBJdGVtIH0gZnJvbSAnLi9JdGVtJztcblxuY29uc3QgeyBfXyB9ID0gd3AuaTE4bjtcblxuLyoqXG4gKiBJdGVtTGlzdCBDb21wb25lbnRcbiAqIEBwYXJhbSBvYmplY3QgcHJvcHMgLSBDb21wb25lbnQgcHJvcHMuXG4gKiBAcmV0dXJucyB7Kn1cbiAqIEBjb25zdHJ1Y3RvclxuICovXG5leHBvcnQgY29uc3QgSXRlbUxpc3QgPSBwcm9wcyA9PiB7XG4gICAgY29uc3QgeyBmaWx0ZXJlZCA9IGZhbHNlLCBsb2FkaW5nID0gZmFsc2UsIGl0ZW1zID0gW10sIGFjdGlvbiA9ICgpID0+IHt9LCBpY29uID0gbnVsbCB9ID0gcHJvcHM7XG5cbiAgICBpZiAobG9hZGluZykge1xuICAgICAgICByZXR1cm4gPHAgY2xhc3NOYW1lPVwibG9hZGluZy1pdGVtc1wiPntfXygnTG9hZGluZyAuLi4nLCAndm9kaS1leHRlbnNpb25zJyl9PC9wPjtcbiAgICB9XG5cbiAgICBpZiAoZmlsdGVyZWQgJiYgaXRlbXMubGVuZ3RoIDwgMSkge1xuICAgICAgICByZXR1cm4gKFxuICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJpdGVtLWxpc3RcIj5cbiAgICAgICAgICAgICAgICA8cD57X18oJ1lvdXIgcXVlcnkgeWllbGRlZCBubyByZXN1bHRzLCBwbGVhc2UgdHJ5IGFnYWluLicsICd2b2RpLWV4dGVuc2lvbnMnKX08L3A+XG4gICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgKTtcbiAgICB9XG5cbiAgICBpZiAoICEgaXRlbXMgfHwgaXRlbXMubGVuZ3RoIDwgMSApIHtcbiAgICAgICAgcmV0dXJuIDxwIGNsYXNzTmFtZT1cIm5vLWl0ZW1zXCI+e19fKCdOb3QgZm91bmQuJywgJ3ZvZGktZXh0ZW5zaW9ucycpfTwvcD5cbiAgICB9XG5cbiAgICByZXR1cm4gKFxuICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cIml0ZW0tbGlzdFwiPlxuICAgICAgICAgICAge2l0ZW1zLm1hcCgoaXRlbSkgPT4gPEl0ZW0ga2V5PXtpdGVtLmlkfSB7Li4uaXRlbX0gY2xpY2tIYW5kbGVyPXthY3Rpb259IGljb249e2ljb259IC8+KX1cbiAgICAgICAgPC9kaXY+XG4gICAgKTtcbn07IiwiaW1wb3J0IHsgSXRlbUxpc3QgfSBmcm9tICcuL0l0ZW1MaXN0JztcbmltcG9ydCAqIGFzIGFwaSBmcm9tICcuLi91dGlscy9hcGknO1xuaW1wb3J0IHsgdW5pcXVlQnlJZCwgZGVib3VuY2UgfSBmcm9tICcuLi91dGlscy91c2VmdWwtZnVuY3MnO1xuXG5jb25zdCB7IF9fIH0gPSB3cC5pMThuO1xuY29uc3QgeyBJY29uIH0gPSB3cC5jb21wb25lbnRzO1xuY29uc3QgeyBDb21wb25lbnQgfSA9IHdwLmVsZW1lbnQ7XG5cbi8qKlxuICogUG9zdFNlbGVjdG9yIENvbXBvbmVudFxuICovXG5leHBvcnQgY2xhc3MgUG9zdFNlbGVjdG9yIGV4dGVuZHMgQ29tcG9uZW50IHtcbiAgICAvKipcbiAgICAgKiBDb25zdHJ1Y3RvciBmb3IgUG9zdFNlbGVjdG9yIENvbXBvbmVudC5cbiAgICAgKiBTZXRzIHVwIHN0YXRlLCBhbmQgY3JlYXRlcyBiaW5kaW5ncyBmb3IgZnVuY3Rpb25zLlxuICAgICAqIEBwYXJhbSBvYmplY3QgcHJvcHMgLSBjdXJyZW50IGNvbXBvbmVudCBwcm9wZXJ0aWVzLlxuICAgICAqL1xuICAgIGNvbnN0cnVjdG9yKHByb3BzKSB7XG4gICAgICAgIHN1cGVyKC4uLmFyZ3VtZW50cyk7XG4gICAgICAgIHRoaXMucHJvcHMgPSBwcm9wcztcblxuICAgICAgICB0aGlzLnN0YXRlID0ge1xuICAgICAgICAgICAgcG9zdHM6IFtdLFxuICAgICAgICAgICAgbG9hZGluZzogZmFsc2UsXG4gICAgICAgICAgICB0eXBlOiBwcm9wcy5wb3N0VHlwZSB8fCAncG9zdCcsXG4gICAgICAgICAgICB0eXBlczogW10sXG4gICAgICAgICAgICBmaWx0ZXI6ICcnLFxuICAgICAgICAgICAgZmlsdGVyTG9hZGluZzogZmFsc2UsXG4gICAgICAgICAgICBmaWx0ZXJQb3N0czogW10sXG4gICAgICAgICAgICBpbml0aWFsTG9hZGluZzogZmFsc2UsXG4gICAgICAgICAgICBzZWxlY3RlZFBvc3RzOiBbXSxcbiAgICAgICAgfTtcblxuICAgICAgICB0aGlzLmFkZFBvc3QgPSB0aGlzLmFkZFBvc3QuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5yZW1vdmVQb3N0ID0gdGhpcy5yZW1vdmVQb3N0LmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMuaGFuZGxlSW5wdXRGaWx0ZXJDaGFuZ2UgPSB0aGlzLmhhbmRsZUlucHV0RmlsdGVyQ2hhbmdlLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMuZG9Qb3N0RmlsdGVyID0gZGVib3VuY2UodGhpcy5kb1Bvc3RGaWx0ZXIuYmluZCh0aGlzKSwgMzAwKTtcbiAgICAgICAgdGhpcy5nZXRTZWxlY3RlZFBvc3RJZHMgPSB0aGlzLmdldFNlbGVjdGVkUG9zdElkcy5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLmdldFNlbGVjdGVkUG9zdHMgPSB0aGlzLmdldFNlbGVjdGVkUG9zdHMuYmluZCh0aGlzKTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBXaGVuIHRoZSBjb21wb25lbnQgbW91bnRzIGl0IGNhbGxzIHRoaXMgZnVuY3Rpb24uXG4gICAgICogRmV0Y2hlcyBwb3N0cyB0eXBlcywgc2VsZWN0ZWQgcG9zdHMgdGhlbiBtYWtlcyBmaXJzdCBjYWxsIGZvciBwb3N0c1xuICAgICAqL1xuICAgIGNvbXBvbmVudERpZE1vdW50KCkge1xuICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgIGluaXRpYWxMb2FkaW5nOiB0cnVlLFxuICAgICAgICB9KTtcblxuICAgICAgICBhcGkuZ2V0UG9zdFR5cGVzKClcbiAgICAgICAgICAgIC50aGVuKCggcmVzcG9uc2UgKSA9PiB7XG4gICAgICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgICAgIHR5cGVzOiByZXNwb25zZVxuICAgICAgICAgICAgICAgIH0sICgpID0+IHtcbiAgICAgICAgICAgICAgICAgICAgdGhpcy5yZXRyaWV2ZVNlbGVjdGVkUG9zdHMoKVxuICAgICAgICAgICAgICAgICAgICAgICAgLnRoZW4oKCBzZWxlY3RlZFBvc3RzICkgPT4ge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmKCBzZWxlY3RlZFBvc3RzICkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGluaXRpYWxMb2FkaW5nOiBmYWxzZSxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHNlbGVjdGVkUG9zdHM6IHNlbGVjdGVkUG9zdHMsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaW5pdGlhbExvYWRpbmc6IGZhbHNlLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogR2V0UG9zdHMgd3JhcHBlciwgYnVpbGRzIHRoZSByZXF1ZXN0IGFyZ3VtZW50IGJhc2VkIHN0YXRlIGFuZCBwYXJhbWV0ZXJzIHBhc3NlZC9cbiAgICAgKiBAcGFyYW0ge29iamVjdH0gYXJncyAtIGRlc2lyZWQgYXJndW1lbnRzIChjYW4gYmUgZW1wdHkpLlxuICAgICAqIEByZXR1cm5zIHtQcm9taXNlPFQ+fVxuICAgICAqL1xuICAgIGdldFBvc3RzKGFyZ3MgPSB7fSkge1xuICAgICAgICBjb25zdCBwb3N0SWRzID0gdGhpcy5nZXRTZWxlY3RlZFBvc3RJZHMoKTtcblxuICAgICAgICBjb25zdCBkZWZhdWx0QXJncyA9IHtcbiAgICAgICAgICAgIHBlcl9wYWdlOiAxMCxcbiAgICAgICAgICAgIHR5cGU6IHRoaXMuc3RhdGUudHlwZSxcbiAgICAgICAgICAgIHNlYXJjaDogdGhpcy5zdGF0ZS5maWx0ZXIsXG4gICAgICAgIH07XG5cbiAgICAgICAgY29uc3QgcmVxdWVzdEFyZ3VtZW50cyA9IHtcbiAgICAgICAgICAgIC4uLmRlZmF1bHRBcmdzLFxuICAgICAgICAgICAgLi4uYXJnc1xuICAgICAgICB9O1xuXG4gICAgICAgIHJlcXVlc3RBcmd1bWVudHMucmVzdEJhc2UgPSB0aGlzLnN0YXRlLnR5cGVzW3RoaXMuc3RhdGUudHlwZV0ucmVzdF9iYXNlO1xuXG4gICAgICAgIHJldHVybiBhcGkuZ2V0UG9zdHMocmVxdWVzdEFyZ3VtZW50cylcbiAgICAgICAgICAgIC50aGVuKHJlc3BvbnNlID0+IHtcbiAgICAgICAgICAgICAgICBpZiAocmVxdWVzdEFyZ3VtZW50cy5zZWFyY2gpIHtcbiAgICAgICAgICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgICAgICAgICBmaWx0ZXJQb3N0czogcmVzcG9uc2UuZmlsdGVyKCh7IGlkIH0pID0+IHBvc3RJZHMuaW5kZXhPZihpZCkgPT09IC0xKSxcbiAgICAgICAgICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIHJlc3BvbnNlO1xuICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgICAgICAgICBwb3N0czogdW5pcXVlQnlJZChbLi4udGhpcy5zdGF0ZS5wb3N0cywgLi4ucmVzcG9uc2VdKSxcbiAgICAgICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgICAgIC8vIHJldHVybiByZXNwb25zZSB0byBjb250aW51ZSB0aGUgY2hhaW5cbiAgICAgICAgICAgICAgICByZXR1cm4gcmVzcG9uc2U7XG4gICAgICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBHZXRzIHRoZSBzZWxlY3RlZCBwb3N0cyBieSBpZCBmcm9tIHRoZSBgcG9zdHNgIHN0YXRlIG9iamVjdCBhbmQgc29ydHMgdGhlbSBieSB0aGVpciBwb3NpdGlvbiBpbiB0aGUgc2VsZWN0ZWQgYXJyYXkuXG4gICAgICogQHJldHVybnMgQXJyYXkgb2Ygb2JqZWN0cy5cbiAgICAgKi9cbiAgICBnZXRTZWxlY3RlZFBvc3RJZHMoKSB7XG4gICAgICAgIGNvbnN0IHsgc2VsZWN0ZWRQb3N0SWRzIH0gPSB0aGlzLnByb3BzO1xuXG4gICAgICAgIGlmKCBzZWxlY3RlZFBvc3RJZHMgKSB7XG4gICAgICAgICAgICBjb25zdCBwb3N0SWRzID0gQXJyYXkuaXNBcnJheSggc2VsZWN0ZWRQb3N0SWRzICkgPyBzZWxlY3RlZFBvc3RJZHMgOiBzZWxlY3RlZFBvc3RJZHMuc3BsaXQoJywnKTtcbiAgICAgICAgICAgIHJldHVybiBwb3N0SWRzO1xuICAgICAgICB9XG5cbiAgICAgICAgcmV0dXJuIFtdO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEdldHMgdGhlIHNlbGVjdGVkIHBvc3RzIGJ5IGlkIGZyb20gdGhlIGBwb3N0c2Agc3RhdGUgb2JqZWN0IGFuZCBzb3J0cyB0aGVtIGJ5IHRoZWlyIHBvc2l0aW9uIGluIHRoZSBzZWxlY3RlZCBhcnJheS5cbiAgICAgKiBAcmV0dXJucyBBcnJheSBvZiBvYmplY3RzLlxuICAgICAqL1xuICAgIGdldFNlbGVjdGVkUG9zdHMoIHBvc3RJZHMgKSB7XG4gICAgICAgIC8vIGNvbnN0IGZpbHRlclBvc3RzTGlzdCA9IHRoaXMuc3RhdGUuZmlsdGVyaW5nICYmICF0aGlzLnN0YXRlLmZpbHRlckxvYWRpbmcgPyB0aGlzLnN0YXRlLmZpbHRlclBvc3RzIDogW107XG4gICAgICAgIGNvbnN0IHBvc3RMaXN0ID0gdW5pcXVlQnlJZChbXG4gICAgICAgICAgICAuLi50aGlzLnN0YXRlLmZpbHRlclBvc3RzLFxuICAgICAgICAgICAgLi4udGhpcy5zdGF0ZS5wb3N0c1xuICAgICAgICBdKTtcbiAgICAgICAgY29uc3Qgc2VsZWN0ZWRQb3N0cyA9IHBvc3RMaXN0XG4gICAgICAgICAgICAuZmlsdGVyKCh7IGlkIH0pID0+IHBvc3RJZHMuaW5kZXhPZihpZCkgIT09IC0xKVxuICAgICAgICAgICAgLnNvcnQoKGEsIGIpID0+IHtcbiAgICAgICAgICAgICAgICBjb25zdCBhSW5kZXggPSBwb3N0SWRzLmluZGV4T2YoYS5pZCk7XG4gICAgICAgICAgICAgICAgY29uc3QgYkluZGV4ID0gcG9zdElkcy5pbmRleE9mKGIuaWQpO1xuXG4gICAgICAgICAgICAgICAgaWYgKGFJbmRleCA+IGJJbmRleCkge1xuICAgICAgICAgICAgICAgICAgICByZXR1cm4gMTtcbiAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICBpZiAoYUluZGV4IDwgYkluZGV4KSB7XG4gICAgICAgICAgICAgICAgICAgIHJldHVybiAtMTtcbiAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICByZXR1cm4gMDtcbiAgICAgICAgICAgIH0pO1xuXG4gICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgc2VsZWN0ZWRQb3N0czogc2VsZWN0ZWRQb3N0cyxcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogTWFrZXMgdGhlIG5lY2Vzc2FyeSBhcGkgY2FsbHMgdG8gZmV0Y2ggdGhlIHNlbGVjdGVkIHBvc3RzIGFuZCByZXR1cm5zIGEgcHJvbWlzZS5cbiAgICAgKiBAcmV0dXJucyB7Kn1cbiAgICAgKi9cbiAgICByZXRyaWV2ZVNlbGVjdGVkUG9zdHMoKSB7XG4gICAgICAgIGNvbnN0IHsgcG9zdFR5cGUsIHNlbGVjdGVkUG9zdElkcyB9ID0gdGhpcy5wcm9wcztcbiAgICAgICAgY29uc3QgeyB0eXBlcyB9ID0gdGhpcy5zdGF0ZTtcblxuICAgICAgICBjb25zdCBwb3N0SWRzID0gdGhpcy5nZXRTZWxlY3RlZFBvc3RJZHMoKS5qb2luKCcsJyk7XG5cbiAgICAgICAgaWYgKCAhIHBvc3RJZHMgKSB7XG4gICAgICAgICAgICAvLyByZXR1cm4gYSBmYWtlIHByb21pc2UgdGhhdCBhdXRvIHJlc29sdmVzLlxuICAgICAgICAgICAgcmV0dXJuIG5ldyBQcm9taXNlKChyZXNvbHZlKSA9PiByZXNvbHZlKCkpO1xuICAgICAgICB9XG5cbiAgICAgICAgbGV0IHBvc3RfYXJncyA9IHtcbiAgICAgICAgICAgIGluY2x1ZGU6IHBvc3RJZHMsXG4gICAgICAgICAgICBwZXJfcGFnZTogMTAwLFxuICAgICAgICAgICAgcG9zdFR5cGVcbiAgICAgICAgfTtcblxuICAgICAgICBpZiggdGhpcy5wcm9wcy5wb3N0U3RhdHVzICkge1xuICAgICAgICAgICAgcG9zdF9hcmdzLnN0YXR1cyA9IHRoaXMucHJvcHMucG9zdFN0YXR1cztcbiAgICAgICAgfVxuXG4gICAgICAgIHJldHVybiB0aGlzLmdldFBvc3RzKHtcbiAgICAgICAgICAgIC4uLnBvc3RfYXJnc1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBBZGRzIGRlc2lyZWQgcG9zdCBpZCB0byB0aGUgc2VsZWN0ZWRQb3N0SWRzIExpc3RcbiAgICAgKiBAcGFyYW0ge0ludGVnZXJ9IHBvc3RfaWRcbiAgICAgKi9cbiAgICBhZGRQb3N0KHBvc3RfaWQpIHtcbiAgICAgICAgaWYgKHRoaXMuc3RhdGUuZmlsdGVyKSB7XG4gICAgICAgICAgICBjb25zdCBwb3N0ID0gdGhpcy5zdGF0ZS5maWx0ZXJQb3N0cy5maWx0ZXIocCA9PiBwLmlkID09PSBwb3N0X2lkKTtcbiAgICAgICAgICAgIGNvbnN0IHBvc3RzID0gdW5pcXVlQnlJZChbXG4gICAgICAgICAgICAgICAgLi4udGhpcy5zdGF0ZS5wb3N0cyxcbiAgICAgICAgICAgICAgICAuLi5wb3N0XG4gICAgICAgICAgICBdKTtcblxuICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgcG9zdHNcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG5cbiAgICAgICAgaWYoIHRoaXMucHJvcHMuc2VsZWN0U2luZ2xlICkge1xuICAgICAgICAgICAgY29uc3Qgc2VsZWN0ZWRQb3N0SWRzID0gWyBwb3N0X2lkIF07XG4gICAgICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZVNlbGVjdGVkUG9zdElkcyggc2VsZWN0ZWRQb3N0SWRzICk7XG4gICAgICAgICAgICB0aGlzLmdldFNlbGVjdGVkUG9zdHMoIHNlbGVjdGVkUG9zdElkcyApO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgY29uc3QgcG9zdElkcyA9IHRoaXMuZ2V0U2VsZWN0ZWRQb3N0SWRzKCk7XG4gICAgICAgICAgICBjb25zdCBzZWxlY3RlZFBvc3RJZHMgPSBbIC4uLnBvc3RJZHMsIHBvc3RfaWQgXTtcbiAgICAgICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2VsZWN0ZWRQb3N0SWRzKCBzZWxlY3RlZFBvc3RJZHMgKTtcbiAgICAgICAgICAgIHRoaXMuZ2V0U2VsZWN0ZWRQb3N0cyggc2VsZWN0ZWRQb3N0SWRzICk7XG4gICAgICAgIH1cbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBSZW1vdmVzIGRlc2lyZWQgcG9zdCBpZCB0byB0aGUgc2VsZWN0ZWRQb3N0SWRzIExpc3RcbiAgICAgKiBAcGFyYW0ge0ludGVnZXJ9IHBvc3RfaWRcbiAgICAgKi9cbiAgICByZW1vdmVQb3N0KHBvc3RfaWQpIHtcbiAgICAgICAgY29uc3QgcG9zdElkcyA9IHRoaXMuZ2V0U2VsZWN0ZWRQb3N0SWRzKCk7XG4gICAgICAgIGNvbnN0IHNlbGVjdGVkUG9zdElkcyA9IFsgLi4ucG9zdElkcyBdLmZpbHRlcihpZCA9PiBpZCAhPT0gcG9zdF9pZCk7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2VsZWN0ZWRQb3N0SWRzKCBzZWxlY3RlZFBvc3RJZHMgKTtcbiAgICAgICAgdGhpcy5nZXRTZWxlY3RlZFBvc3RzKCBzZWxlY3RlZFBvc3RJZHMgKTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBIYW5kbGVzIHRoZSBzZWFyY2ggYm94IGlucHV0IHZhbHVlXG4gICAgICogQHBhcmFtIHN0cmluZyB0eXBlIC0gY29tZXMgZnJvbSB0aGUgZXZlbnQgb2JqZWN0IHRhcmdldC5cbiAgICAgKi9cbiAgICBoYW5kbGVJbnB1dEZpbHRlckNoYW5nZSh7IHRhcmdldDogeyB2YWx1ZTpmaWx0ZXIgPSAnJyB9ID0ge30gfSA9IHt9KSB7XG4gICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgZmlsdGVyXG4gICAgICAgIH0sICgpID0+IHtcbiAgICAgICAgICAgIGlmICghZmlsdGVyKSB7XG4gICAgICAgICAgICAgICAgLy8gcmVtb3ZlIGZpbHRlcmVkIHBvc3RzXG4gICAgICAgICAgICAgICAgcmV0dXJuIHRoaXMuc2V0U3RhdGUoeyBmaWx0ZXJlZFBvc3RzOiBbXSwgZmlsdGVyaW5nOiBmYWxzZSB9KTtcbiAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgdGhpcy5kb1Bvc3RGaWx0ZXIoKTtcbiAgICAgICAgfSlcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBBY3R1YWwgYXBpIGNhbGwgZm9yIHNlYXJjaGluZyBmb3IgcXVlcnksIHRoaXMgZnVuY3Rpb24gaXMgZGVib3VuY2VkIGluIGNvbnN0cnVjdG9yLlxuICAgICAqL1xuICAgIGRvUG9zdEZpbHRlcigpIHtcbiAgICAgICAgY29uc3QgeyBmaWx0ZXIgPSAnJyB9ID0gdGhpcy5zdGF0ZTtcblxuICAgICAgICBpZiAoIWZpbHRlcikge1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG5cbiAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICBmaWx0ZXJpbmc6IHRydWUsXG4gICAgICAgICAgICBmaWx0ZXJMb2FkaW5nOiB0cnVlXG4gICAgICAgIH0pO1xuXG4gICAgICAgIGxldCBwb3N0X2FyZ3MgPSB7fTtcblxuICAgICAgICBpZiggdGhpcy5wcm9wcy5wb3N0U3RhdHVzICkge1xuICAgICAgICAgICAgcG9zdF9hcmdzLnN0YXR1cyA9IHRoaXMucHJvcHMucG9zdFN0YXR1cztcbiAgICAgICAgfVxuXG4gICAgICAgIHRoaXMuZ2V0UG9zdHMoe1xuICAgICAgICAgICAgLi4ucG9zdF9hcmdzXG4gICAgICAgIH0pLnRoZW4oKCkgPT4ge1xuICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgZmlsdGVyTG9hZGluZzogZmFsc2VcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBSZW5kZXJzIHRoZSBQb3N0U2VsZWN0b3IgY29tcG9uZW50LlxuICAgICAqL1xuICAgIHJlbmRlcigpIHtcbiAgICAgICAgY29uc3QgcG9zdExpc3QgPSB0aGlzLnN0YXRlLmZpbHRlcmluZyAmJiAhdGhpcy5zdGF0ZS5maWx0ZXJMb2FkaW5nID8gdGhpcy5zdGF0ZS5maWx0ZXJQb3N0cyA6IFtdO1xuXG4gICAgICAgIGNvbnN0IGFkZEljb24gPSA8SWNvbiBpY29uPVwicGx1c1wiIC8+O1xuICAgICAgICBjb25zdCByZW1vdmVJY29uID0gPEljb24gaWNvbj1cIm1pbnVzXCIgLz47XG5cbiAgICAgICAgY29uc3Qgc2VhcmNoaW5wdXR1bmlxdWVJZCA9ICdzZWFyY2hpbnB1dC0nICsgTWF0aC5yYW5kb20oKS50b1N0cmluZygzNikuc3Vic3RyKDIsIDE2KTtcblxuICAgICAgICByZXR1cm4gKFxuICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjb21wb25lbnRzLWJhc2UtY29udHJvbCBjb21wb25lbnRzLXBvc3Qtc2VsZWN0b3JcIj5cbiAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sX19maWVsZC0tc2VsZWN0ZWRcIj5cbiAgICAgICAgICAgICAgICAgICAgPGgyPntfXygnU2VhcmNoIFBvc3QnLCAndm9kaS1leHRlbnNpb25zJyl9PC9oMj5cbiAgICAgICAgICAgICAgICAgICAgPEl0ZW1MaXN0XG4gICAgICAgICAgICAgICAgICAgICAgICBpdGVtcz17IFsuLi50aGlzLnN0YXRlLnNlbGVjdGVkUG9zdHNdIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIGxvYWRpbmc9e3RoaXMuc3RhdGUuaW5pdGlhbExvYWRpbmd9XG4gICAgICAgICAgICAgICAgICAgICAgICBhY3Rpb249e3RoaXMucmVtb3ZlUG9zdH1cbiAgICAgICAgICAgICAgICAgICAgICAgIGljb249e3JlbW92ZUljb259XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjb21wb25lbnRzLWJhc2UtY29udHJvbF9fZmllbGRcIj5cbiAgICAgICAgICAgICAgICAgICAgPGxhYmVsIGh0bWxGb3I9e3NlYXJjaGlucHV0dW5pcXVlSWR9IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sX19sYWJlbFwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgPEljb24gaWNvbj1cInNlYXJjaFwiIC8+XG4gICAgICAgICAgICAgICAgICAgIDwvbGFiZWw+XG4gICAgICAgICAgICAgICAgICAgIDxpbnB1dFxuICAgICAgICAgICAgICAgICAgICAgICAgY2xhc3NOYW1lPVwiY29tcG9uZW50cy10ZXh0LWNvbnRyb2xfX2lucHV0XCJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlkPXtzZWFyY2hpbnB1dHVuaXF1ZUlkfVxuICAgICAgICAgICAgICAgICAgICAgICAgdHlwZT1cInNlYXJjaFwiXG4gICAgICAgICAgICAgICAgICAgICAgICBwbGFjZWhvbGRlcj17X18oJ1BsZWFzZSBlbnRlciB5b3VyIHNlYXJjaCBxdWVyeS4uLicsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlPXt0aGlzLnN0YXRlLmZpbHRlcn1cbiAgICAgICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXt0aGlzLmhhbmRsZUlucHV0RmlsdGVyQ2hhbmdlfVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICA8SXRlbUxpc3RcbiAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW1zPXtwb3N0TGlzdH1cbiAgICAgICAgICAgICAgICAgICAgICAgIGxvYWRpbmc9e3RoaXMuc3RhdGUuaW5pdGlhbExvYWRpbmd8fHRoaXMuc3RhdGUubG9hZGluZ3x8dGhpcy5zdGF0ZS5maWx0ZXJMb2FkaW5nfVxuICAgICAgICAgICAgICAgICAgICAgICAgZmlsdGVyZWQ9e3RoaXMuc3RhdGUuZmlsdGVyaW5nfVxuICAgICAgICAgICAgICAgICAgICAgICAgYWN0aW9uPXt0aGlzLmFkZFBvc3R9XG4gICAgICAgICAgICAgICAgICAgICAgICBpY29uPXthZGRJY29ufVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICk7XG4gICAgfVxufSIsImNvbnN0IHsgYXBpRmV0Y2ggfSA9IHdwO1xuXG4vKipcbiAqIE1ha2VzIGEgZ2V0IHJlcXVlc3QgdG8gdGhlIFBvc3RUeXBlcyBlbmRwb2ludC5cbiAqXG4gKiBAcmV0dXJucyB7UHJvbWlzZTxhbnk+fVxuICovXG5leHBvcnQgY29uc3QgZ2V0UG9zdFR5cGVzID0gKCkgPT4ge1xuICAgIHJldHVybiBhcGlGZXRjaCggeyBwYXRoOiAnL3dwL3YyL3R5cGVzJyB9ICk7XG59O1xuXG4vKipcbiAqIE1ha2VzIGEgZ2V0IHJlcXVlc3QgdG8gdGhlIGRlc2lyZWQgcG9zdCB0eXBlIGFuZCBidWlsZHMgdGhlIHF1ZXJ5IHN0cmluZyBiYXNlZCBvbiBhbiBvYmplY3QuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd8Ym9vbGVhbn0gcmVzdEJhc2UgLSByZXN0IGJhc2UgZm9yIHRoZSBxdWVyeS5cbiAqIEBwYXJhbSB7b2JqZWN0fSBhcmdzXG4gKiBAcmV0dXJucyB7UHJvbWlzZTxhbnk+fVxuICovXG5leHBvcnQgY29uc3QgZ2V0UG9zdHMgPSAoeyByZXN0QmFzZSA9IGZhbHNlLCAuLi5hcmdzIH0pID0+IHtcbiAgICBjb25zdCBxdWVyeVN0cmluZyA9IE9iamVjdC5rZXlzKGFyZ3MpLm1hcChhcmcgPT4gYCR7YXJnfT0ke2FyZ3NbYXJnXX1gKS5qb2luKCcmJyk7XG5cbiAgICBsZXQgcGF0aCA9IGAvd3AvdjIvJHtyZXN0QmFzZX0/JHtxdWVyeVN0cmluZ30mX2VtYmVkYDtcbiAgICByZXR1cm4gYXBpRmV0Y2goIHsgcGF0aDogcGF0aCB9ICk7XG59O1xuXG4vKipcbiAqIE1ha2VzIGEgZ2V0IHJlcXVlc3QgdG8gdGhlIFBvc3RUeXBlIFRheG9ub21pZXMgZW5kcG9pbnQuXG4gKlxuICogQHJldHVybnMge1Byb21pc2U8YW55Pn1cbiAqL1xuZXhwb3J0IGNvbnN0IGdldFRheG9ub21pZXMgPSAoeyAuLi5hcmdzIH0pID0+IHtcbiAgICBjb25zdCBxdWVyeVN0cmluZyA9IE9iamVjdC5rZXlzKGFyZ3MpLm1hcChhcmcgPT4gYCR7YXJnfT0ke2FyZ3NbYXJnXX1gKS5qb2luKCcmJyk7XG5cbiAgICBsZXQgcGF0aCA9IGAvd3AvdjIvdGF4b25vbWllcz8ke3F1ZXJ5U3RyaW5nfSZfZW1iZWRgO1xuICAgIHJldHVybiBhcGlGZXRjaCggeyBwYXRoOiBwYXRoIH0gKTtcbn07XG5cbi8qKlxuICogTWFrZXMgYSBnZXQgcmVxdWVzdCB0byB0aGUgZGVzaXJlZCBwb3N0IHR5cGUgYW5kIGJ1aWxkcyB0aGUgcXVlcnkgc3RyaW5nIGJhc2VkIG9uIGFuIG9iamVjdC5cbiAqXG4gKiBAcGFyYW0ge3N0cmluZ3xib29sZWFufSByZXN0QmFzZSAtIHJlc3QgYmFzZSBmb3IgdGhlIHF1ZXJ5LlxuICogQHBhcmFtIHtvYmplY3R9IGFyZ3NcbiAqIEByZXR1cm5zIHtQcm9taXNlPGFueT59XG4gKi9cbmV4cG9ydCBjb25zdCBnZXRUZXJtcyA9ICh7IHJlc3RCYXNlID0gZmFsc2UsIC4uLmFyZ3MgfSkgPT4ge1xuICAgIGNvbnN0IHF1ZXJ5U3RyaW5nID0gT2JqZWN0LmtleXMoYXJncykubWFwKGFyZyA9PiBgJHthcmd9PSR7YXJnc1thcmddfWApLmpvaW4oJyYnKTtcblxuICAgIGxldCBwYXRoID0gYC93cC92Mi8ke3Jlc3RCYXNlfT8ke3F1ZXJ5U3RyaW5nfSZfZW1iZWRgO1xuICAgIHJldHVybiBhcGlGZXRjaCggeyBwYXRoOiBwYXRoIH0gKTtcbn07IiwiLyoqXG4gKiBSZXR1cm5zIGEgdW5pcXVlIGFycmF5IG9mIG9iamVjdHMgYmFzZWQgb24gYSBkZXNpcmVkIGtleS5cbiAqIEBwYXJhbSB7YXJyYXl9IGFyciAtIGFycmF5IG9mIG9iamVjdHMuXG4gKiBAcGFyYW0ge3N0cmluZ3xpbnR9IGtleSAtIGtleSB0byBmaWx0ZXIgb2JqZWN0cyBieVxuICovXG5leHBvcnQgY29uc3QgdW5pcXVlQnkgPSAoYXJyLCBrZXkpID0+IHtcbiAgICBsZXQga2V5cyA9IFtdO1xuICAgIHJldHVybiBhcnIuZmlsdGVyKGl0ZW0gPT4ge1xuICAgICAgICBpZiAoa2V5cy5pbmRleE9mKGl0ZW1ba2V5XSkgIT09IC0xKSB7XG4gICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgIH1cblxuICAgICAgICByZXR1cm4ga2V5cy5wdXNoKGl0ZW1ba2V5XSk7XG4gICAgfSk7XG59O1xuXG4vKipcbiAqIFJldHVybnMgYSB1bmlxdWUgYXJyYXkgb2Ygb2JqZWN0cyBiYXNlZCBvbiB0aGUgaWQgcHJvcGVydHkuXG4gKiBAcGFyYW0ge2FycmF5fSBhcnIgLSBhcnJheSBvZiBvYmplY3RzIHRvIGZpbHRlci5cbiAqIEByZXR1cm5zIHsqfVxuICovXG5leHBvcnQgY29uc3QgdW5pcXVlQnlJZCA9IGFyciA9PiB1bmlxdWVCeShhcnIsICdpZCcpO1xuXG4vKipcbiAqIERlYm91bmNlIGEgZnVuY3Rpb24gYnkgbGltaXRpbmcgaG93IG9mdGVuIGl0IGNhbiBydW4uXG4gKiBAcGFyYW0ge2Z1bmN0aW9ufSBmdW5jIC0gY2FsbGJhY2sgZnVuY3Rpb25cbiAqIEBwYXJhbSB7SW50ZWdlcn0gd2FpdCAtIFRpbWUgaW4gbWlsbGlzZWNvbmRzIGhvdyBsb25nIGl0IHNob3VsZCB3YWl0LlxuICogQHJldHVybnMge0Z1bmN0aW9ufVxuICovXG5leHBvcnQgY29uc3QgZGVib3VuY2UgPSAoZnVuYywgd2FpdCkgPT4ge1xuICAgIGxldCB0aW1lb3V0ID0gbnVsbDtcblxuICAgIHJldHVybiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNvbnN0IGNvbnRleHQgPSB0aGlzO1xuICAgICAgICBjb25zdCBhcmdzID0gYXJndW1lbnRzO1xuXG4gICAgICAgIGNvbnN0IGxhdGVyID0gKCkgPT4ge1xuICAgICAgICAgICAgZnVuYy5hcHBseShjb250ZXh0LCBhcmdzKTtcbiAgICAgICAgfTtcblxuICAgICAgICBjbGVhclRpbWVvdXQodGltZW91dCk7XG4gICAgICAgIHRpbWVvdXQgPSBzZXRUaW1lb3V0KGxhdGVyLCB3YWl0KTtcbiAgICB9XG59OyJdfQ==
