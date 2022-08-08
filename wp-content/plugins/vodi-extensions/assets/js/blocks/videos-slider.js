(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

var _PostSelector = require("../components/PostSelector");

var _DesignOptions = require("../components/DesignOptions");

var _Repeater = require("../components/Repeater");

var _ImageUpload = require("../components/ImageUpload");

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
  TextControl
} = wp.components;
registerBlockType('vodi/videos-slider', {
  title: __('Videos Slider', 'vodi-extensions'),
  icon: 'video-alt2',
  category: 'vodi-blocks',
  edit: props => {
    const {
      attributes,
      setAttributes
    } = props;
    const {
      sliders,
      design_options
    } = attributes;

    const onChangeSliders = newSliders => {
      setAttributes({
        sliders: JSON.stringify([...newSliders])
      });
    };

    const onChangePreTitle = (newPreTitle, index) => {
      var sliders_updated = JSON.parse(sliders);
      sliders_updated[index].pre_title = newPreTitle;
      setAttributes({
        sliders: JSON.stringify([...sliders_updated])
      });
    };

    const onChangeSubTitle = (newSubTitle, index) => {
      var sliders_updated = JSON.parse(sliders);
      sliders_updated[index].sub_title = newSubTitle;
      setAttributes({
        sliders: JSON.stringify([...sliders_updated])
      });
    };

    const onChangeSlidersIds = (newIds, index) => {
      var sliders_updated = JSON.parse(sliders);
      sliders_updated[index].video_id = newIds.join(',');
      setAttributes({
        sliders: JSON.stringify([...sliders_updated])
      });
    };

    const onChangeSlidersBgImage = (media, index) => {
      var sliders_updated = JSON.parse(sliders);
      sliders_updated[index].bg_image = media.id;
      setAttributes({
        sliders: JSON.stringify([...sliders_updated])
      });
    };

    const onChangeSlidersImage = (media, index) => {
      var sliders_updated = JSON.parse(sliders);
      sliders_updated[index].image = media.id;
      setAttributes({
        sliders: JSON.stringify([...sliders_updated])
      });
    };

    const onChangeDesignOptions = newDesignOptions => {
      setAttributes({
        design_options: { ...design_options,
          ...newDesignOptions
        }
      });
    };

    return wp.element.createElement(Fragment, null, wp.element.createElement(InspectorControls, null, wp.element.createElement(_Repeater.Repeater, {
      title: __('Sliders', 'vodi-extensions'),
      values: sliders ? JSON.parse(sliders) : [],
      defaultValues: {
        video_id: '',
        bg_image: ''
      },
      updateValues: onChangeSliders
    }, wp.element.createElement(TextControl, {
      label: __('Section Pre Title', 'vodi-extensions'),
      name: "pre_title",
      valuekey: "value",
      value: "",
      trigger_method_name: "onChange",
      onChange: onChangePreTitle
    }), wp.element.createElement(TextControl, {
      label: __('Section Sub Title', 'vodi-extensions'),
      name: "sub_title",
      valuekey: "value",
      value: "",
      trigger_method_name: "onChange",
      onChange: onChangeSubTitle
    }), wp.element.createElement(_PostSelector.PostSelector, {
      postType: "video",
      selectSingle: true,
      name: "video_id",
      valuekey: "selectedPostIds",
      selectedPostIds: "",
      trigger_method_name: "updateSelectedPostIds",
      updateSelectedPostIds: onChangeSlidersIds
    }), wp.element.createElement(_ImageUpload.ImageUpload, {
      addImageLabel: __('Pick an Background Image', 'vodi-extensions'),
      replaceImageLabel: __('Replace Background Image', 'vodi-extensions'),
      removeImageLabel: __('Remove Background Image', 'vodi-extensions'),
      name: "bg_image",
      valuekey: "value",
      value: "",
      trigger_method_name: "onSelect",
      onSelect: onChangeSlidersBgImage
    })), wp.element.createElement(PanelBody, {
      title: __('Design Options', 'vodi-extensions'),
      initialOpen: false
    }, wp.element.createElement(_DesignOptions.DesignOptions, {
      attributes: { ...design_options
      },
      updateDesignOptions: onChangeDesignOptions
    }))), wp.element.createElement(Disabled, null, sliders ? wp.element.createElement(ServerSideRender, {
      block: "vodi/videos-slider",
      attributes: attributes
    }) : __('Add sliders', 'vodi-extensions')));
  },

  save() {
    // Rendering in PHP
    return null;
  }

});

},{"../components/DesignOptions":2,"../components/ImageUpload":3,"../components/PostSelector":6,"../components/Repeater":7}],2:[function(require,module,exports){
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

},{"../utils/api":8,"../utils/useful-funcs":9,"./ItemList":5}],7:[function(require,module,exports){
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

},{}],9:[function(require,module,exports){
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9ibG9ja3MvdmlkZW9zLXNsaWRlci5qcyIsInNyYy9wbHVnaW5zL3ZvZGktZXh0ZW5zaW9ucy9hc3NldHMvZXNuZXh0L2NvbXBvbmVudHMvRGVzaWduT3B0aW9ucy5qcyIsInNyYy9wbHVnaW5zL3ZvZGktZXh0ZW5zaW9ucy9hc3NldHMvZXNuZXh0L2NvbXBvbmVudHMvSW1hZ2VVcGxvYWQuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9jb21wb25lbnRzL0l0ZW0uanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9jb21wb25lbnRzL0l0ZW1MaXN0LmpzIiwic3JjL3BsdWdpbnMvdm9kaS1leHRlbnNpb25zL2Fzc2V0cy9lc25leHQvY29tcG9uZW50cy9Qb3N0U2VsZWN0b3IuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9jb21wb25lbnRzL1JlcGVhdGVyLmpzIiwic3JjL3BsdWdpbnMvdm9kaS1leHRlbnNpb25zL2Fzc2V0cy9lc25leHQvdXRpbHMvYXBpLmpzIiwic3JjL3BsdWdpbnMvdm9kaS1leHRlbnNpb25zL2Fzc2V0cy9lc25leHQvdXRpbHMvdXNlZnVsLWZ1bmNzLmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBOzs7QUNBQTs7QUFDQTs7QUFDQTs7QUFDQTs7QUFFQSxNQUFNO0FBQUUsRUFBQTtBQUFGLElBQVMsRUFBRSxDQUFDLElBQWxCO0FBQ0EsTUFBTTtBQUFFLEVBQUE7QUFBRixJQUF3QixFQUFFLENBQUMsTUFBakM7QUFDQSxNQUFNO0FBQUUsRUFBQTtBQUFGLElBQXdCLEVBQUUsQ0FBQyxNQUFqQztBQUNBLE1BQU07QUFBRSxFQUFBO0FBQUYsSUFBZSxFQUFFLENBQUMs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QUEsT0FBTyxHQUFHLFVBQVUsQ0FBQyxLQUFELEVBQVEsSUFBUixDQUFwQjtBQUNILEdBVkQ7QUFXSCxDQWRNIiwiZmlsZSI6ImdlbmVyYXRlZC5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24oKXtmdW5jdGlvbiByKGUsbix0KXtmdW5jdGlvbiBvKGksZil7aWYoIW5baV0pe2lmKCFlW2ldKXt2YXIgYz1cImZ1bmN0aW9uXCI9PXR5cGVvZiByZXF1aXJlJiZyZXF1aXJlO2lmKCFmJiZjKXJldHVybiBjKGksITApO2lmKHUpcmV0dXJuIHUoaSwhMCk7dmFyIGE9bmV3IEVycm9yKFwiQ2Fubm90IGZpbmQgbW9kdWxlICdcIitpK1wiJ1wiKTt0aHJvdyBhLmNvZGU9XCJNT0RVTEVfTk9UX0ZPVU5EXCIsYX12YXIgcD1uW2ldPXtleHBvcnRzOnt9fTtlW2ldWzBdLmNhbGwocC5leHBvcnRzLGZ1bmN0aW9uKHIpe3ZhciBuPWVbaV1bMV1bcl07cmV0dXJuIG8obnx8cil9LHAscC5leHBvcnRzLHIsZSxuLHQpfXJldHVybiBuW2ldLmV4cG9ydHN9Zm9yKHZhciB1PVwiZnVuY3Rpb25cIj09dHlwZW9mIHJlcXVpcmUmJnJlcXVpcmUsaT0wO2k8dC5sZW5ndGg7aSsrKW8odFtpXSk7cmV0dXJuIG99cmV0dXJuIHJ9KSgpIiwiaW1wb3J0IHsgUG9zdFNlbGVjdG9yIH0gZnJvbSAnLi4vY29tcG9uZW50cy9Qb3N0U2VsZWN0b3InO1xuaW1wb3J0IHsgRGVzaWduT3B0aW9ucyB9IGZyb20gJy4uL2NvbXBvbmVudHMvRGVzaWduT3B0aW9ucyc7XG5pbXBvcnQgeyBSZXBlYXRlciB9IGZyb20gJy4uL2NvbXBvbmVudHMvUmVwZWF0ZXInO1xuaW1wb3J0IHsgSW1hZ2VVcGxvYWQgfSBmcm9tICcuLi9jb21wb25lbnRzL0ltYWdlVXBsb2FkJztcblxuY29uc3QgeyBfXyB9ID0gd3AuaTE4bjtcbmNvbnN0IHsgcmVnaXN0ZXJCbG9ja1R5cGUgfSA9IHdwLmJsb2NrcztcbmNvbnN0IHsgSW5zcGVjdG9yQ29udHJvbHMgfSA9IHdwLmVkaXRvcjtcbmNvbnN0IHsgRnJhZ21lbnQgfSA9IHdwLmVsZW1lbnQ7XG5jb25zdCB7IFNlcnZlclNpZGVSZW5kZXIsIERpc2FibGVkLCBQYW5lbEJvZHksIFRleHRDb250cm9sIH0gPSB3cC5jb21wb25lbnRzO1xuXG5yZWdpc3RlckJsb2NrVHlwZSggJ3ZvZGkvdmlkZW9zLXNsaWRlcicsIHtcbiAgICB0aXRsZTogX18oJ1ZpZGVvcyBTbGlkZXInLCAndm9kaS1leHRlbnNpb25zJyksXG5cbiAgICBpY29uOiAndmlkZW8tYWx0MicsXG5cbiAgICBjYXRlZ29yeTogJ3ZvZGktYmxvY2tzJyxcblxuICAgIGVkaXQ6ICggKCBwcm9wcyApID0+IHtcbiAgICAgICAgY29uc3QgeyBhdHRyaWJ1dGVzLCBzZXRBdHRyaWJ1dGVzIH0gPSBwcm9wcztcbiAgICAgICAgY29uc3QgeyBzbGlkZXJzLCBkZXNpZ25fb3B0aW9ucyB9ID0gYXR0cmlidXRlcztcblxuICAgICAgICBjb25zdCBvbkNoYW5nZVNsaWRlcnMgPSBuZXdTbGlkZXJzID0+IHtcbiAgICAgICAgICAgIHNldEF0dHJpYnV0ZXMoIHsgc2xpZGVyczogSlNPTi5zdHJpbmdpZnkoWy4uLm5ld1NsaWRlcnNdKSB9ICk7XG4gICAgICAgIH07XG5cbiAgICAgICAgY29uc3Qgb25DaGFuZ2VQcmVUaXRsZSA9IChuZXdQcmVUaXRsZSwgaW5kZXgpID0+IHtcbiAgICAgICAgICAgIHZhciBzbGlkZXJzX3VwZGF0ZWQgPSBKU09OLnBhcnNlKHNsaWRlcnMgKTtcbiAgICAgICAgICAgIHNsaWRlcnNfdXBkYXRlZFtpbmRleF0ucHJlX3RpdGxlID0gbmV3UHJlVGl0bGU7XG4gICAgICAgICAgICBzZXRBdHRyaWJ1dGVzKCB7IHNsaWRlcnM6IEpTT04uc3RyaW5naWZ5KFsuLi5zbGlkZXJzX3VwZGF0ZWRdKSB9ICk7XG4gICAgICAgIH07XG4gICAgICAgICAgICBcblxuICAgICAgICBjb25zdCBvbkNoYW5nZVN1YlRpdGxlID0gKG5ld1N1YlRpdGxlLCBpbmRleCkgPT4ge1xuICAgICAgICAgICAgdmFyIHNsaWRlcnNfdXBkYXRlZCA9IEpTT04ucGFyc2Uoc2xpZGVycyApO1xuICAgICAgICAgICAgc2xpZGVyc191cGRhdGVkW2luZGV4XS5zdWJfdGl0bGUgPSBuZXdTdWJUaXRsZTtcbiAgICAgICAgICAgIHNldEF0dHJpYnV0ZXMoIHsgc2xpZGVyczogSlNPTi5zdHJpbmdpZnkoWy4uLnNsaWRlcnNfdXBkYXRlZF0pIH0gKTtcbiAgICAgICAgfTtcblxuICAgICAgICBjb25zdCBvbkNoYW5nZVNsaWRlcnNJZHMgPSAobmV3SWRzLCBpbmRleCkgPT4ge1xuICAgICAgICAgICAgdmFyIHNsaWRlcnNfdXBkYXRlZCA9IEpTT04ucGFyc2Uoc2xpZGVycyApO1xuICAgICAgICAgICAgc2xpZGVyc191cGRhdGVkW2luZGV4XS52aWRlb19pZCA9IG5ld0lkcy5qb2luKCcsJyk7XG4gICAgICAgICAgICBzZXRBdHRyaWJ1dGVzKCB7IHNsaWRlcnM6IEpTT04uc3RyaW5naWZ5KFsuLi5zbGlkZXJzX3VwZGF0ZWRdKSB9ICk7XG4gICAgICAgIH07XG5cbiAgICAgICAgY29uc3Qgb25DaGFuZ2VTbGlkZXJzQmdJbWFnZSA9IChtZWRpYSwgaW5kZXgpID0+IHtcbiAgICAgICAgICAgIHZhciBzbGlkZXJzX3VwZGF0ZWQgPSBKU09OLnBhcnNlKHNsaWRlcnMgKTtcbiAgICAgICAgICAgIHNsaWRlcnNfdXBkYXRlZFtpbmRleF0uYmdfaW1hZ2UgPSBtZWRpYS5pZDtcbiAgICAgICAgICAgIHNldEF0dHJpYnV0ZXMoIHsgc2xpZGVyczogSlNPTi5zdHJpbmdpZnkoWy4uLnNsaWRlcnNfdXBkYXRlZF0pIH0gKTtcbiAgICAgICAgfTtcblxuICAgICAgICBjb25zdCBvbkNoYW5nZVNsaWRlcnNJbWFnZSA9IChtZWRpYSwgaW5kZXgpID0+IHtcbiAgICAgICAgICAgIHZhciBzbGlkZXJzX3VwZGF0ZWQgPSBKU09OLnBhcnNlKHNsaWRlcnMgKTtcbiAgICAgICAgICAgIHNsaWRlcnNfdXBkYXRlZFtpbmRleF0uaW1hZ2UgPSBtZWRpYS5pZDtcbiAgICAgICAgICAgIHNldEF0dHJpYnV0ZXMoIHsgc2xpZGVyczogSlNPTi5zdHJpbmdpZnkoWy4uLnNsaWRlcnNfdXBkYXRlZF0pIH0gKTtcbiAgICAgICAgfTtcblxuICAgICAgICBjb25zdCBvbkNoYW5nZURlc2lnbk9wdGlvbnMgPSBuZXdEZXNpZ25PcHRpb25zID0+IHtcbiAgICAgICAgICAgIHNldEF0dHJpYnV0ZXMoIHsgZGVzaWduX29wdGlvbnM6IHsgLi4uZGVzaWduX29wdGlvbnMsIC4uLm5ld0Rlc2lnbk9wdGlvbnMgfSB9ICk7XG4gICAgICAgIH07XG5cbiAgICAgICAgcmV0dXJuIChcbiAgICAgICAgICAgIDxGcmFnbWVudD5cbiAgICAgICAgICAgICAgICA8SW5zcGVjdG9yQ29udHJvbHM+XG4gICAgICAgICAgICAgICAgICAgIDxSZXBlYXRlclxuICAgICAgICAgICAgICAgICAgICAgICAgdGl0bGU9e19fKCdTbGlkZXJzJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWVzPXsgc2xpZGVycyA/IEpTT04ucGFyc2Uoc2xpZGVycykgOiBbXSB9XG4gICAgICAgICAgICAgICAgICAgICAgICBkZWZhdWx0VmFsdWVzPXsgeyB2aWRlb19pZDogJycsIGJnX2ltYWdlOiAnJyB9IH1cbiAgICAgICAgICAgICAgICAgICAgICAgIHVwZGF0ZVZhbHVlcz17IG9uQ2hhbmdlU2xpZGVycyB9XG4gICAgICAgICAgICAgICAgICAgID5cbiAgICAgICAgICAgICAgICAgICAgICAgIDxUZXh0Q29udHJvbFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnU2VjdGlvbiBQcmUgVGl0bGUnLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbmFtZT0ncHJlX3RpdGxlJ1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVla2V5PSd2YWx1ZSdcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZT0nJ1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRyaWdnZXJfbWV0aG9kX25hbWU9J29uQ2hhbmdlJ1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgb25DaGFuZ2VQcmVUaXRsZSB9XG4gICAgICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICAgICAgPFRleHRDb250cm9sXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdTZWN0aW9uIFN1YiBUaXRsZScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBuYW1lPSdzdWJfdGl0bGUnXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWVrZXk9J3ZhbHVlJ1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlPScnXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdHJpZ2dlcl9tZXRob2RfbmFtZT0nb25DaGFuZ2UnXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyBvbkNoYW5nZVN1YlRpdGxlIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgICAgICA8UG9zdFNlbGVjdG9yXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcG9zdFR5cGUgPSAndmlkZW8nXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0U2luZ2xlID0geyB0cnVlIH1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBuYW1lPSd2aWRlb19pZCdcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZWtleT0nc2VsZWN0ZWRQb3N0SWRzJ1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHNlbGVjdGVkUG9zdElkcz0nJ1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRyaWdnZXJfbWV0aG9kX25hbWU9J3VwZGF0ZVNlbGVjdGVkUG9zdElkcydcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB1cGRhdGVTZWxlY3RlZFBvc3RJZHM9eyBvbkNoYW5nZVNsaWRlcnNJZHMgfVxuICAgICAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICAgICAgICAgIDxJbWFnZVVwbG9hZFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGFkZEltYWdlTGFiZWw9eyBfXygnUGljayBhbiBCYWNrZ3JvdW5kIEltYWdlJywgJ3ZvZGktZXh0ZW5zaW9ucycpIH1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICByZXBsYWNlSW1hZ2VMYWJlbD17IF9fKCdSZXBsYWNlIEJhY2tncm91bmQgSW1hZ2UnLCAndm9kaS1leHRlbnNpb25zJykgfVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHJlbW92ZUltYWdlTGFiZWw9eyBfXygnUmVtb3ZlIEJhY2tncm91bmQgSW1hZ2UnLCAndm9kaS1leHRlbnNpb25zJykgfVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIG5hbWU9J2JnX2ltYWdlJ1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVla2V5PSd2YWx1ZSdcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZT0nJ1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRyaWdnZXJfbWV0aG9kX25hbWU9J29uU2VsZWN0J1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9uU2VsZWN0PXsgb25DaGFuZ2VTbGlkZXJzQmdJbWFnZSB9XG4gICAgICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICA8L1JlcGVhdGVyPlxuICAgICAgICAgICAgICAgICAgICA8UGFuZWxCb2R5XG4gICAgICAgICAgICAgICAgICAgICAgICB0aXRsZT17X18oJ0Rlc2lnbiBPcHRpb25zJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgaW5pdGlhbE9wZW49eyBmYWxzZSB9XG4gICAgICAgICAgICAgICAgICAgID5cbiAgICAgICAgICAgICAgICAgICAgICAgIDxEZXNpZ25PcHRpb25zXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYXR0cmlidXRlcyA9IHsgeyAuLi5kZXNpZ25fb3B0aW9ucyB9IH1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB1cGRhdGVEZXNpZ25PcHRpb25zID0geyBvbkNoYW5nZURlc2lnbk9wdGlvbnMgfVxuICAgICAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICAgICAgPC9QYW5lbEJvZHk+XG4gICAgICAgICAgICAgICAgPC9JbnNwZWN0b3JDb250cm9scz5cbiAgICAgICAgICAgICAgICA8RGlzYWJsZWQ+XG4gICAgICAgICAgICAgICAgICAgIHsgc2xpZGVycyA/IChcbiAgICAgICAgICAgICAgICAgICAgPFNlcnZlclNpZGVSZW5kZXJcbiAgICAgICAgICAgICAgICAgICAgICAgIGJsb2NrPVwidm9kaS92aWRlb3Mtc2xpZGVyXCJcbiAgICAgICAgICAgICAgICAgICAgICAgIGF0dHJpYnV0ZXM9eyBhdHRyaWJ1dGVzIH1cbiAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICAgICAgKSA6IF9fKCdBZGQgc2xpZGVycycsICd2b2RpLWV4dGVuc2lvbnMnKSB9XG4gICAgICAgICAgICAgICAgPC9EaXNhYmxlZD5cbiAgICAgICAgICAgIDwvRnJhZ21lbnQ+XG4gICAgICAgICk7XG4gICAgfSApLFxuXG4gICAgc2F2ZSgpIHtcbiAgICAgICAgLy8gUmVuZGVyaW5nIGluIFBIUFxuICAgICAgICByZXR1cm4gbnVsbDtcbiAgICB9LFxufSApOyIsImNvbnN0IHsgX18gfSA9IHdwLmkxOG47XG5jb25zdCB7IENvbXBvbmVudCB9ID0gd3AuZWxlbWVudDtcbmNvbnN0IHsgUmFuZ2VDb250cm9sIH0gPSB3cC5jb21wb25lbnRzO1xuXG4vKipcbiAqIERlc2lnbk9wdGlvbnMgQ29tcG9uZW50XG4gKi9cbmV4cG9ydCBjbGFzcyBEZXNpZ25PcHRpb25zIGV4dGVuZHMgQ29tcG9uZW50IHtcbiAgICAvKipcbiAgICAgKiBDb25zdHJ1Y3RvciBmb3IgRGVzaWduT3B0aW9ucyBDb21wb25lbnQuXG4gICAgICogU2V0cyB1cCBzdGF0ZSwgYW5kIGNyZWF0ZXMgYmluZGluZ3MgZm9yIGZ1bmN0aW9ucy5cbiAgICAgKiBAcGFyYW0gb2JqZWN0IHByb3BzIC0gY3VycmVudCBjb21wb25lbnQgcHJvcGVydGllcy5cbiAgICAgKi9cbiAgICBjb25zdHJ1Y3Rvcihwcm9wcykge1xuICAgICAgICBzdXBlciguLi5hcmd1bWVudHMpO1xuICAgICAgICB0aGlzLnByb3BzID0gcHJvcHM7XG5cbiAgICAgICAgdGhpcy5vbkNoYW5nZVBhZGRpbmdUb3AgPSB0aGlzLm9uQ2hhbmdlUGFkZGluZ1RvcC5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlUGFkZGluZ0JvdHRvbSA9IHRoaXMub25DaGFuZ2VQYWRkaW5nQm90dG9tLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VQYWRkaW5nTGVmdCA9IHRoaXMub25DaGFuZ2VQYWRkaW5nTGVmdC5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlUGFkZGluZ1JpZ2h0ID0gdGhpcy5vbkNoYW5nZVBhZGRpbmdSaWdodC5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlTWFyZ2luVG9wID0gdGhpcy5vbkNoYW5nZU1hcmdpblRvcC5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlTWFyZ2luQm90dG9tID0gdGhpcy5vbkNoYW5nZU1hcmdpbkJvdHRvbS5iaW5kKHRoaXMpO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlUGFkZGluZ1RvcCggbmV3b25DaGFuZ2VQYWRkaW5nVG9wICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZURlc2lnbk9wdGlvbnMoe1xuICAgICAgICAgICAgcGFkZGluZ190b3A6IG5ld29uQ2hhbmdlUGFkZGluZ1RvcFxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZVBhZGRpbmdCb3R0b20oIG5ld29uQ2hhbmdlUGFkZGluZ0JvdHRvbSApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVEZXNpZ25PcHRpb25zKHtcbiAgICAgICAgICAgIHBhZGRpbmdfYm90dG9tOiBuZXdvbkNoYW5nZVBhZGRpbmdCb3R0b21cbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VQYWRkaW5nTGVmdCggbmV3b25DaGFuZ2VQYWRkaW5nTGVmdCApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVEZXNpZ25PcHRpb25zKHtcbiAgICAgICAgICAgIHBhZGRpbmdfbGVmdDogbmV3b25DaGFuZ2VQYWRkaW5nTGVmdFxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZVBhZGRpbmdSaWdodCggbmV3b25DaGFuZ2VQYWRkaW5nUmlnaHQgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlRGVzaWduT3B0aW9ucyh7XG4gICAgICAgICAgICBwYWRkaW5nX3JpZ2h0OiBuZXdvbkNoYW5nZVBhZGRpbmdSaWdodFxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZU1hcmdpblRvcCggbmV3b25DaGFuZ2VNYXJnaW5Ub3AgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlRGVzaWduT3B0aW9ucyh7XG4gICAgICAgICAgICBtYXJnaW5fdG9wOiBuZXdvbkNoYW5nZU1hcmdpblRvcFxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZU1hcmdpbkJvdHRvbSggbmV3b25DaGFuZ2VNYXJnaW5Cb3R0b20gKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlRGVzaWduT3B0aW9ucyh7XG4gICAgICAgICAgICBtYXJnaW5fYm90dG9tOiBuZXdvbkNoYW5nZU1hcmdpbkJvdHRvbVxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBSZW5kZXJzIHRoZSBEZXNpZ25PcHRpb25zIGNvbXBvbmVudC5cbiAgICAgKi9cbiAgICByZW5kZXIoKSB7XG4gICAgICAgIGNvbnN0IHsgYXR0cmlidXRlcyB9ID0gdGhpcy5wcm9wcztcbiAgICAgICAgY29uc3QgeyBwYWRkaW5nX3RvcCwgcGFkZGluZ19ib3R0b20sIHBhZGRpbmdfbGVmdCwgcGFkZGluZ19yaWdodCwgbWFyZ2luX3RvcCwgbWFyZ2luX2JvdHRvbSB9ID0gYXR0cmlidXRlcztcblxuICAgICAgICByZXR1cm4gKFxuICAgICAgICAgICAgPGRpdj5cbiAgICAgICAgICAgICAgICA8UmFuZ2VDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnUGFkZGluZyBUb3AgKHB4KScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBwYWRkaW5nX3RvcCB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZVBhZGRpbmdUb3AgfVxuICAgICAgICAgICAgICAgICAgICBtaW49eyAwIH1cbiAgICAgICAgICAgICAgICAgICAgbWF4PXsgMTAwIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDxSYW5nZUNvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdQYWRkaW5nIEJvdHRvbSAocHgpJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IHBhZGRpbmdfYm90dG9tIH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlUGFkZGluZ0JvdHRvbSB9XG4gICAgICAgICAgICAgICAgICAgIG1pbj17IDAgfVxuICAgICAgICAgICAgICAgICAgICBtYXg9eyAxMDAgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPFJhbmdlQ29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ1BhZGRpbmcgTGVmdCAocHgpJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IHBhZGRpbmdfbGVmdCB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZVBhZGRpbmdMZWZ0IH1cbiAgICAgICAgICAgICAgICAgICAgbWluPXsgMCB9XG4gICAgICAgICAgICAgICAgICAgIG1heD17IDEwMCB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8UmFuZ2VDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnUGFkZGluZyBSaWdodCAocHgpJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IHBhZGRpbmdfcmlnaHQgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VQYWRkaW5nUmlnaHQgfVxuICAgICAgICAgICAgICAgICAgICBtaW49eyAwIH1cbiAgICAgICAgICAgICAgICAgICAgbWF4PXsgMTAwIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDxSYW5nZUNvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdNYXJnaW4gVG9wIChweCknLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgbWFyZ2luX3RvcCB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZU1hcmdpblRvcCB9XG4gICAgICAgICAgICAgICAgICAgIG1pbj17IC0xMDAgfVxuICAgICAgICAgICAgICAgICAgICBtYXg9eyAxMDAgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPFJhbmdlQ29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ01hcmdpbiBCb3R0b20gKHB4KScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBtYXJnaW5fYm90dG9tIH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlTWFyZ2luQm90dG9tIH1cbiAgICAgICAgICAgICAgICAgICAgbWluPXsgLTEwMCB9XG4gICAgICAgICAgICAgICAgICAgIG1heD17IDEwMCB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICApO1xuICAgIH1cbn0iLCJjb25zdCB7IF9fIH0gPSB3cC5pMThuO1xuY29uc3QgeyBNZWRpYVVwbG9hZCB9ID0gd3AuZWRpdG9yO1xuY29uc3QgeyBGcmFnbWVudCwgQ29tcG9uZW50IH0gPSB3cC5lbGVtZW50O1xuY29uc3QgeyBCdXR0b24gfSA9IHdwLmNvbXBvbmVudHM7XG5cbi8qKlxuICogSW1hZ2VVcGxvYWQgQ29tcG9uZW50XG4gKi9cbmV4cG9ydCBjbGFzcyBJbWFnZVVwbG9hZCBleHRlbmRzIENvbXBvbmVudCB7XG4gICAgLyoqXG4gICAgICogQ29uc3RydWN0b3IgZm9yIEltYWdlVXBsb2FkIENvbXBvbmVudC5cbiAgICAgKiBTZXRzIHVwIHN0YXRlLCBhbmQgY3JlYXRlcyBiaW5kaW5ncyBmb3IgZnVuY3Rpb25zLlxuICAgICAqIEBwYXJhbSBvYmplY3QgcHJvcHMgLSBjdXJyZW50IGNvbXBvbmVudCBwcm9wZXJ0aWVzLlxuICAgICAqL1xuICAgIGNvbnN0cnVjdG9yKHByb3BzKSB7XG4gICAgICAgIHN1cGVyKC4uLmFyZ3VtZW50cyk7XG4gICAgICAgIHRoaXMucHJvcHMgPSBwcm9wcztcblxuICAgICAgICB0aGlzLm9uQ2hhbmdlSW1hZ2UgPSB0aGlzLm9uQ2hhbmdlSW1hZ2UuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vblJlbW92ZUltYWdlID0gdGhpcy5vblJlbW92ZUltYWdlLmJpbmQodGhpcyk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VJbWFnZSggbWVkaWEgKSB7XG4gICAgICAgIHRoaXMucHJvcHMub25TZWxlY3QoIG1lZGlhICk7XG4gICAgfVxuXG4gICAgb25SZW1vdmVJbWFnZSgpIHtcbiAgICAgICAgdGhpcy5wcm9wcy5vblNlbGVjdCggMCApO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFJlbmRlcnMgdGhlIEltYWdlVXBsb2FkIGNvbXBvbmVudC5cbiAgICAgKi9cbiAgICByZW5kZXIoKSB7XG4gICAgICAgIGNvbnN0IHsgYXR0cmlidXRlcywgYWRkSW1hZ2VMYWJlbCwgcmVwbGFjZUltYWdlTGFiZWwsIHJlbW92ZUltYWdlTGFiZWwsIHZhbHVlIH0gPSB0aGlzLnByb3BzO1xuXG4gICAgICAgIHJldHVybiAoXG4gICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sIGNvbXBvbmVudHMtaW1hZ2UtdXBsb2FkXCI+XG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjb21wb25lbnRzLWJhc2UtY29udHJvbF9fZmllbGRcIj5cbiAgICAgICAgICAgICAgICAgICAgPE1lZGlhVXBsb2FkXG4gICAgICAgICAgICAgICAgICAgICAgICBvblNlbGVjdD17IHRoaXMub25DaGFuZ2VJbWFnZSB9XG4gICAgICAgICAgICAgICAgICAgICAgICB0eXBlPVwiaW1hZ2VcIlxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyB2YWx1ZSB9XG4gICAgICAgICAgICAgICAgICAgICAgICByZW5kZXI9eyAoIHsgb3BlbiB9ICkgPT4gKFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiYnV0dG9uLWNvbnRhaW5lclwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8QnV0dG9uIGlzU2Vjb25kYXJ5IGlzTGFyZ2Ugb25DbGljaz17IG9wZW4gfSBzdHlsZT17e21hcmdpbkJvdHRvbTogJy41cmVtJ319PlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgeyAoIHZhbHVlICkgPyByZXBsYWNlSW1hZ2VMYWJlbCA6IGFkZEltYWdlTGFiZWwgfVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L0J1dHRvbj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICAgICAgICAgICkgfVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgIHsgKCB2YWx1ZSApID8gKFxuICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sX19maWVsZFwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJidXR0b24tY29udGFpbmVyXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPEJ1dHRvbiBpc1NlY29uZGFyeSBpc0xhcmdlIG9uQ2xpY2s9eyB0aGlzLm9uUmVtb3ZlSW1hZ2UgfSBzdHlsZT17e21hcmdpbkJvdHRvbTogJy41cmVtJ319PlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB7IHJlbW92ZUltYWdlTGFiZWwgfVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvQnV0dG9uPlxuICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgICkgOiAnJyB9XG4gICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgKTtcbiAgICB9XG59IiwiXG4vKipcbiAqIEl0ZW0gQ29tcG9uZW50LlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSBpdGVtVGl0bGUgLSBDdXJyZW50IGl0ZW0gdGl0bGUuXG4gKiBAcGFyYW0ge2Z1bmN0aW9ufSBjbGlja0hhbmRsZXIgLSB0aGlzIGlzIHRoZSBoYW5kbGluZyBmdW5jdGlvbiBmb3IgdGhlIGFkZC9yZW1vdmUgZnVuY3Rpb25cbiAqIEBwYXJhbSB7SW50ZWdlcn0gaXRlbUlkIC0gQ3VycmVudCBpdGVtIElEXG4gKiBAcGFyYW0gaWNvblxuICogQHJldHVybnMgeyp9IEl0ZW0gSFRNTC5cbiAqL1xuZXhwb3J0IGNvbnN0IEl0ZW0gPSAoeyB0aXRsZTogeyByZW5kZXJlZDogaXRlbVRpdGxlIH0gPSB7fSwgbmFtZSwgY2xpY2tIYW5kbGVyLCBpZDogaXRlbUlkLCBpY29uIH0pID0+IChcbiAgICA8YXJ0aWNsZSBjbGFzc05hbWU9XCJpdGVtXCI+XG4gICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiaXRlbS1ib2R5XCI+XG4gICAgICAgICAgICA8aDMgY2xhc3NOYW1lPVwiaXRlbS10aXRsZVwiIHN0eWxlPXt7bWFyZ2luVG9wOiAnMCd9fT57aXRlbVRpdGxlfXtuYW1lfTwvaDM+XG4gICAgICAgIDwvZGl2PlxuICAgICAgICA8YnV0dG9uIG9uQ2xpY2s9eygpID0+IGNsaWNrSGFuZGxlcihpdGVtSWQpfT57aWNvbn08L2J1dHRvbj5cbiAgICA8L2FydGljbGU+XG4pOyIsImltcG9ydCB7IEl0ZW0gfSBmcm9tICcuL0l0ZW0nO1xuXG5jb25zdCB7IF9fIH0gPSB3cC5pMThuO1xuXG4vKipcbiAqIEl0ZW1MaXN0IENvbXBvbmVudFxuICogQHBhcmFtIG9iamVjdCBwcm9wcyAtIENvbXBvbmVudCBwcm9wcy5cbiAqIEByZXR1cm5zIHsqfVxuICogQGNvbnN0cnVjdG9yXG4gKi9cbmV4cG9ydCBjb25zdCBJdGVtTGlzdCA9IHByb3BzID0+IHtcbiAgICBjb25zdCB7IGZpbHRlcmVkID0gZmFsc2UsIGxvYWRpbmcgPSBmYWxzZSwgaXRlbXMgPSBbXSwgYWN0aW9uID0gKCkgPT4ge30sIGljb24gPSBudWxsIH0gPSBwcm9wcztcblxuICAgIGlmIChsb2FkaW5nKSB7XG4gICAgICAgIHJldHVybiA8cCBjbGFzc05hbWU9XCJsb2FkaW5nLWl0ZW1zXCI+e19fKCdMb2FkaW5nIC4uLicsICd2b2RpLWV4dGVuc2lvbnMnKX08L3A+O1xuICAgIH1cblxuICAgIGlmIChmaWx0ZXJlZCAmJiBpdGVtcy5sZW5ndGggPCAxKSB7XG4gICAgICAgIHJldHVybiAoXG4gICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cIml0ZW0tbGlzdFwiPlxuICAgICAgICAgICAgICAgIDxwPntfXygnWW91ciBxdWVyeSB5aWVsZGVkIG5vIHJlc3VsdHMsIHBsZWFzZSB0cnkgYWdhaW4uJywgJ3ZvZGktZXh0ZW5zaW9ucycpfTwvcD5cbiAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICApO1xuICAgIH1cblxuICAgIGlmICggISBpdGVtcyB8fCBpdGVtcy5sZW5ndGggPCAxICkge1xuICAgICAgICByZXR1cm4gPHAgY2xhc3NOYW1lPVwibm8taXRlbXNcIj57X18oJ05vdCBmb3VuZC4nLCAndm9kaS1leHRlbnNpb25zJyl9PC9wPlxuICAgIH1cblxuICAgIHJldHVybiAoXG4gICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiaXRlbS1saXN0XCI+XG4gICAgICAgICAgICB7aXRlbXMubWFwKChpdGVtKSA9PiA8SXRlbSBrZXk9e2l0ZW0uaWR9IHsuLi5pdGVtfSBjbGlja0hhbmRsZXI9e2FjdGlvbn0gaWNvbj17aWNvbn0gLz4pfVxuICAgICAgICA8L2Rpdj5cbiAgICApO1xufTsiLCJpbXBvcnQgeyBJdGVtTGlzdCB9IGZyb20gJy4vSXRlbUxpc3QnO1xuaW1wb3J0ICogYXMgYXBpIGZyb20gJy4uL3V0aWxzL2FwaSc7XG5pbXBvcnQgeyB1bmlxdWVCeUlkLCBkZWJvdW5jZSB9IGZyb20gJy4uL3V0aWxzL3VzZWZ1bC1mdW5jcyc7XG5cbmNvbnN0IHsgX18gfSA9IHdwLmkxOG47XG5jb25zdCB7IEljb24gfSA9IHdwLmNvbXBvbmVudHM7XG5jb25zdCB7IENvbXBvbmVudCB9ID0gd3AuZWxlbWVudDtcblxuLyoqXG4gKiBQb3N0U2VsZWN0b3IgQ29tcG9uZW50XG4gKi9cbmV4cG9ydCBjbGFzcyBQb3N0U2VsZWN0b3IgZXh0ZW5kcyBDb21wb25lbnQge1xuICAgIC8qKlxuICAgICAqIENvbnN0cnVjdG9yIGZvciBQb3N0U2VsZWN0b3IgQ29tcG9uZW50LlxuICAgICAqIFNldHMgdXAgc3RhdGUsIGFuZCBjcmVhdGVzIGJpbmRpbmdzIGZvciBmdW5jdGlvbnMuXG4gICAgICogQHBhcmFtIG9iamVjdCBwcm9wcyAtIGN1cnJlbnQgY29tcG9uZW50IHByb3BlcnRpZXMuXG4gICAgICovXG4gICAgY29uc3RydWN0b3IocHJvcHMpIHtcbiAgICAgICAgc3VwZXIoLi4uYXJndW1lbnRzKTtcbiAgICAgICAgdGhpcy5wcm9wcyA9IHByb3BzO1xuXG4gICAgICAgIHRoaXMuc3RhdGUgPSB7XG4gICAgICAgICAgICBwb3N0czogW10sXG4gICAgICAgICAgICBsb2FkaW5nOiBmYWxzZSxcbiAgICAgICAgICAgIHR5cGU6IHByb3BzLnBvc3RUeXBlIHx8ICdwb3N0JyxcbiAgICAgICAgICAgIHR5cGVzOiBbXSxcbiAgICAgICAgICAgIGZpbHRlcjogJycsXG4gICAgICAgICAgICBmaWx0ZXJMb2FkaW5nOiBmYWxzZSxcbiAgICAgICAgICAgIGZpbHRlclBvc3RzOiBbXSxcbiAgICAgICAgICAgIGluaXRpYWxMb2FkaW5nOiBmYWxzZSxcbiAgICAgICAgICAgIHNlbGVjdGVkUG9zdHM6IFtdLFxuICAgICAgICB9O1xuXG4gICAgICAgIHRoaXMuYWRkUG9zdCA9IHRoaXMuYWRkUG9zdC5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLnJlbW92ZVBvc3QgPSB0aGlzLnJlbW92ZVBvc3QuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5oYW5kbGVJbnB1dEZpbHRlckNoYW5nZSA9IHRoaXMuaGFuZGxlSW5wdXRGaWx0ZXJDaGFuZ2UuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5kb1Bvc3RGaWx0ZXIgPSBkZWJvdW5jZSh0aGlzLmRvUG9zdEZpbHRlci5iaW5kKHRoaXMpLCAzMDApO1xuICAgICAgICB0aGlzLmdldFNlbGVjdGVkUG9zdElkcyA9IHRoaXMuZ2V0U2VsZWN0ZWRQb3N0SWRzLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMuZ2V0U2VsZWN0ZWRQb3N0cyA9IHRoaXMuZ2V0U2VsZWN0ZWRQb3N0cy5iaW5kKHRoaXMpO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFdoZW4gdGhlIGNvbXBvbmVudCBtb3VudHMgaXQgY2FsbHMgdGhpcyBmdW5jdGlvbi5cbiAgICAgKiBGZXRjaGVzIHBvc3RzIHR5cGVzLCBzZWxlY3RlZCBwb3N0cyB0aGVuIG1ha2VzIGZpcnN0IGNhbGwgZm9yIHBvc3RzXG4gICAgICovXG4gICAgY29tcG9uZW50RGlkTW91bnQoKSB7XG4gICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgaW5pdGlhbExvYWRpbmc6IHRydWUsXG4gICAgICAgIH0pO1xuXG4gICAgICAgIGFwaS5nZXRQb3N0VHlwZXMoKVxuICAgICAgICAgICAgLnRoZW4oKCByZXNwb25zZSApID0+IHtcbiAgICAgICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICAgICAgdHlwZXM6IHJlc3BvbnNlXG4gICAgICAgICAgICAgICAgfSwgKCkgPT4ge1xuICAgICAgICAgICAgICAgICAgICB0aGlzLnJldHJpZXZlU2VsZWN0ZWRQb3N0cygpXG4gICAgICAgICAgICAgICAgICAgICAgICAudGhlbigoIHNlbGVjdGVkUG9zdHMgKSA9PiB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYoIHNlbGVjdGVkUG9zdHMgKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaW5pdGlhbExvYWRpbmc6IGZhbHNlLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0ZWRQb3N0czogc2VsZWN0ZWRQb3N0cyxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpbml0aWFsTG9hZGluZzogZmFsc2UsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBHZXRQb3N0cyB3cmFwcGVyLCBidWlsZHMgdGhlIHJlcXVlc3QgYXJndW1lbnQgYmFzZWQgc3RhdGUgYW5kIHBhcmFtZXRlcnMgcGFzc2VkL1xuICAgICAqIEBwYXJhbSB7b2JqZWN0fSBhcmdzIC0gZGVzaXJlZCBhcmd1bWVudHMgKGNhbiBiZSBlbXB0eSkuXG4gICAgICogQHJldHVybnMge1Byb21pc2U8VD59XG4gICAgICovXG4gICAgZ2V0UG9zdHMoYXJncyA9IHt9KSB7XG4gICAgICAgIGNvbnN0IHBvc3RJZHMgPSB0aGlzLmdldFNlbGVjdGVkUG9zdElkcygpO1xuXG4gICAgICAgIGNvbnN0IGRlZmF1bHRBcmdzID0ge1xuICAgICAgICAgICAgcGVyX3BhZ2U6IDEwLFxuICAgICAgICAgICAgdHlwZTogdGhpcy5zdGF0ZS50eXBlLFxuICAgICAgICAgICAgc2VhcmNoOiB0aGlzLnN0YXRlLmZpbHRlcixcbiAgICAgICAgfTtcblxuICAgICAgICBjb25zdCByZXF1ZXN0QXJndW1lbnRzID0ge1xuICAgICAgICAgICAgLi4uZGVmYXVsdEFyZ3MsXG4gICAgICAgICAgICAuLi5hcmdzXG4gICAgICAgIH07XG5cbiAgICAgICAgcmVxdWVzdEFyZ3VtZW50cy5yZXN0QmFzZSA9IHRoaXMuc3RhdGUudHlwZXNbdGhpcy5zdGF0ZS50eXBlXS5yZXN0X2Jhc2U7XG5cbiAgICAgICAgcmV0dXJuIGFwaS5nZXRQb3N0cyhyZXF1ZXN0QXJndW1lbnRzKVxuICAgICAgICAgICAgLnRoZW4ocmVzcG9uc2UgPT4ge1xuICAgICAgICAgICAgICAgIGlmIChyZXF1ZXN0QXJndW1lbnRzLnNlYXJjaCkge1xuICAgICAgICAgICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGZpbHRlclBvc3RzOiByZXNwb25zZS5maWx0ZXIoKHsgaWQgfSkgPT4gcG9zdElkcy5pbmRleE9mKGlkKSA9PT0gLTEpLFxuICAgICAgICAgICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgICAgICAgICByZXR1cm4gcmVzcG9uc2U7XG4gICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgICAgIHBvc3RzOiB1bmlxdWVCeUlkKFsuLi50aGlzLnN0YXRlLnBvc3RzLCAuLi5yZXNwb25zZV0pLFxuICAgICAgICAgICAgICAgIH0pO1xuXG4gICAgICAgICAgICAgICAgLy8gcmV0dXJuIHJlc3BvbnNlIHRvIGNvbnRpbnVlIHRoZSBjaGFpblxuICAgICAgICAgICAgICAgIHJldHVybiByZXNwb25zZTtcbiAgICAgICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEdldHMgdGhlIHNlbGVjdGVkIHBvc3RzIGJ5IGlkIGZyb20gdGhlIGBwb3N0c2Agc3RhdGUgb2JqZWN0IGFuZCBzb3J0cyB0aGVtIGJ5IHRoZWlyIHBvc2l0aW9uIGluIHRoZSBzZWxlY3RlZCBhcnJheS5cbiAgICAgKiBAcmV0dXJucyBBcnJheSBvZiBvYmplY3RzLlxuICAgICAqL1xuICAgIGdldFNlbGVjdGVkUG9zdElkcygpIHtcbiAgICAgICAgY29uc3QgeyBzZWxlY3RlZFBvc3RJZHMgfSA9IHRoaXMucHJvcHM7XG5cbiAgICAgICAgaWYoIHNlbGVjdGVkUG9zdElkcyApIHtcbiAgICAgICAgICAgIGNvbnN0IHBvc3RJZHMgPSBBcnJheS5pc0FycmF5KCBzZWxlY3RlZFBvc3RJZHMgKSA/IHNlbGVjdGVkUG9zdElkcyA6IHNlbGVjdGVkUG9zdElkcy5zcGxpdCgnLCcpO1xuICAgICAgICAgICAgcmV0dXJuIHBvc3RJZHM7XG4gICAgICAgIH1cblxuICAgICAgICByZXR1cm4gW107XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogR2V0cyB0aGUgc2VsZWN0ZWQgcG9zdHMgYnkgaWQgZnJvbSB0aGUgYHBvc3RzYCBzdGF0ZSBvYmplY3QgYW5kIHNvcnRzIHRoZW0gYnkgdGhlaXIgcG9zaXRpb24gaW4gdGhlIHNlbGVjdGVkIGFycmF5LlxuICAgICAqIEByZXR1cm5zIEFycmF5IG9mIG9iamVjdHMuXG4gICAgICovXG4gICAgZ2V0U2VsZWN0ZWRQb3N0cyggcG9zdElkcyApIHtcbiAgICAgICAgLy8gY29uc3QgZmlsdGVyUG9zdHNMaXN0ID0gdGhpcy5zdGF0ZS5maWx0ZXJpbmcgJiYgIXRoaXMuc3RhdGUuZmlsdGVyTG9hZGluZyA/IHRoaXMuc3RhdGUuZmlsdGVyUG9zdHMgOiBbXTtcbiAgICAgICAgY29uc3QgcG9zdExpc3QgPSB1bmlxdWVCeUlkKFtcbiAgICAgICAgICAgIC4uLnRoaXMuc3RhdGUuZmlsdGVyUG9zdHMsXG4gICAgICAgICAgICAuLi50aGlzLnN0YXRlLnBvc3RzXG4gICAgICAgIF0pO1xuICAgICAgICBjb25zdCBzZWxlY3RlZFBvc3RzID0gcG9zdExpc3RcbiAgICAgICAgICAgIC5maWx0ZXIoKHsgaWQgfSkgPT4gcG9zdElkcy5pbmRleE9mKGlkKSAhPT0gLTEpXG4gICAgICAgICAgICAuc29ydCgoYSwgYikgPT4ge1xuICAgICAgICAgICAgICAgIGNvbnN0IGFJbmRleCA9IHBvc3RJZHMuaW5kZXhPZihhLmlkKTtcbiAgICAgICAgICAgICAgICBjb25zdCBiSW5kZXggPSBwb3N0SWRzLmluZGV4T2YoYi5pZCk7XG5cbiAgICAgICAgICAgICAgICBpZiAoYUluZGV4ID4gYkluZGV4KSB7XG4gICAgICAgICAgICAgICAgICAgIHJldHVybiAxO1xuICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgIGlmIChhSW5kZXggPCBiSW5kZXgpIHtcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIC0xO1xuICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgIHJldHVybiAwO1xuICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICBzZWxlY3RlZFBvc3RzOiBzZWxlY3RlZFBvc3RzLFxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBNYWtlcyB0aGUgbmVjZXNzYXJ5IGFwaSBjYWxscyB0byBmZXRjaCB0aGUgc2VsZWN0ZWQgcG9zdHMgYW5kIHJldHVybnMgYSBwcm9taXNlLlxuICAgICAqIEByZXR1cm5zIHsqfVxuICAgICAqL1xuICAgIHJldHJpZXZlU2VsZWN0ZWRQb3N0cygpIHtcbiAgICAgICAgY29uc3QgeyBwb3N0VHlwZSwgc2VsZWN0ZWRQb3N0SWRzIH0gPSB0aGlzLnByb3BzO1xuICAgICAgICBjb25zdCB7IHR5cGVzIH0gPSB0aGlzLnN0YXRlO1xuXG4gICAgICAgIGNvbnN0IHBvc3RJZHMgPSB0aGlzLmdldFNlbGVjdGVkUG9zdElkcygpLmpvaW4oJywnKTtcblxuICAgICAgICBpZiAoICEgcG9zdElkcyApIHtcbiAgICAgICAgICAgIC8vIHJldHVybiBhIGZha2UgcHJvbWlzZSB0aGF0IGF1dG8gcmVzb2x2ZXMuXG4gICAgICAgICAgICByZXR1cm4gbmV3IFByb21pc2UoKHJlc29sdmUpID0+IHJlc29sdmUoKSk7XG4gICAgICAgIH1cblxuICAgICAgICBsZXQgcG9zdF9hcmdzID0ge1xuICAgICAgICAgICAgaW5jbHVkZTogcG9zdElkcyxcbiAgICAgICAgICAgIHBlcl9wYWdlOiAxMDAsXG4gICAgICAgICAgICBwb3N0VHlwZVxuICAgICAgICB9O1xuXG4gICAgICAgIGlmKCB0aGlzLnByb3BzLnBvc3RTdGF0dXMgKSB7XG4gICAgICAgICAgICBwb3N0X2FyZ3Muc3RhdHVzID0gdGhpcy5wcm9wcy5wb3N0U3RhdHVzO1xuICAgICAgICB9XG5cbiAgICAgICAgcmV0dXJuIHRoaXMuZ2V0UG9zdHMoe1xuICAgICAgICAgICAgLi4ucG9zdF9hcmdzXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEFkZHMgZGVzaXJlZCBwb3N0IGlkIHRvIHRoZSBzZWxlY3RlZFBvc3RJZHMgTGlzdFxuICAgICAqIEBwYXJhbSB7SW50ZWdlcn0gcG9zdF9pZFxuICAgICAqL1xuICAgIGFkZFBvc3QocG9zdF9pZCkge1xuICAgICAgICBpZiAodGhpcy5zdGF0ZS5maWx0ZXIpIHtcbiAgICAgICAgICAgIGNvbnN0IHBvc3QgPSB0aGlzLnN0YXRlLmZpbHRlclBvc3RzLmZpbHRlcihwID0+IHAuaWQgPT09IHBvc3RfaWQpO1xuICAgICAgICAgICAgY29uc3QgcG9zdHMgPSB1bmlxdWVCeUlkKFtcbiAgICAgICAgICAgICAgICAuLi50aGlzLnN0YXRlLnBvc3RzLFxuICAgICAgICAgICAgICAgIC4uLnBvc3RcbiAgICAgICAgICAgIF0pO1xuXG4gICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICBwb3N0c1xuICAgICAgICAgICAgfSk7XG4gICAgICAgIH1cblxuICAgICAgICBpZiggdGhpcy5wcm9wcy5zZWxlY3RTaW5nbGUgKSB7XG4gICAgICAgICAgICBjb25zdCBzZWxlY3RlZFBvc3RJZHMgPSBbIHBvc3RfaWQgXTtcbiAgICAgICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2VsZWN0ZWRQb3N0SWRzKCBzZWxlY3RlZFBvc3RJZHMgKTtcbiAgICAgICAgICAgIHRoaXMuZ2V0U2VsZWN0ZWRQb3N0cyggc2VsZWN0ZWRQb3N0SWRzICk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBjb25zdCBwb3N0SWRzID0gdGhpcy5nZXRTZWxlY3RlZFBvc3RJZHMoKTtcbiAgICAgICAgICAgIGNvbnN0IHNlbGVjdGVkUG9zdElkcyA9IFsgLi4ucG9zdElkcywgcG9zdF9pZCBdO1xuICAgICAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTZWxlY3RlZFBvc3RJZHMoIHNlbGVjdGVkUG9zdElkcyApO1xuICAgICAgICAgICAgdGhpcy5nZXRTZWxlY3RlZFBvc3RzKCBzZWxlY3RlZFBvc3RJZHMgKTtcbiAgICAgICAgfVxuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFJlbW92ZXMgZGVzaXJlZCBwb3N0IGlkIHRvIHRoZSBzZWxlY3RlZFBvc3RJZHMgTGlzdFxuICAgICAqIEBwYXJhbSB7SW50ZWdlcn0gcG9zdF9pZFxuICAgICAqL1xuICAgIHJlbW92ZVBvc3QocG9zdF9pZCkge1xuICAgICAgICBjb25zdCBwb3N0SWRzID0gdGhpcy5nZXRTZWxlY3RlZFBvc3RJZHMoKTtcbiAgICAgICAgY29uc3Qgc2VsZWN0ZWRQb3N0SWRzID0gWyAuLi5wb3N0SWRzIF0uZmlsdGVyKGlkID0+IGlkICE9PSBwb3N0X2lkKTtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTZWxlY3RlZFBvc3RJZHMoIHNlbGVjdGVkUG9zdElkcyApO1xuICAgICAgICB0aGlzLmdldFNlbGVjdGVkUG9zdHMoIHNlbGVjdGVkUG9zdElkcyApO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEhhbmRsZXMgdGhlIHNlYXJjaCBib3ggaW5wdXQgdmFsdWVcbiAgICAgKiBAcGFyYW0gc3RyaW5nIHR5cGUgLSBjb21lcyBmcm9tIHRoZSBldmVudCBvYmplY3QgdGFyZ2V0LlxuICAgICAqL1xuICAgIGhhbmRsZUlucHV0RmlsdGVyQ2hhbmdlKHsgdGFyZ2V0OiB7IHZhbHVlOmZpbHRlciA9ICcnIH0gPSB7fSB9ID0ge30pIHtcbiAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICBmaWx0ZXJcbiAgICAgICAgfSwgKCkgPT4ge1xuICAgICAgICAgICAgaWYgKCFmaWx0ZXIpIHtcbiAgICAgICAgICAgICAgICAvLyByZW1vdmUgZmlsdGVyZWQgcG9zdHNcbiAgICAgICAgICAgICAgICByZXR1cm4gdGhpcy5zZXRTdGF0ZSh7IGZpbHRlcmVkUG9zdHM6IFtdLCBmaWx0ZXJpbmc6IGZhbHNlIH0pO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICB0aGlzLmRvUG9zdEZpbHRlcigpO1xuICAgICAgICB9KVxuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEFjdHVhbCBhcGkgY2FsbCBmb3Igc2VhcmNoaW5nIGZvciBxdWVyeSwgdGhpcyBmdW5jdGlvbiBpcyBkZWJvdW5jZWQgaW4gY29uc3RydWN0b3IuXG4gICAgICovXG4gICAgZG9Qb3N0RmlsdGVyKCkge1xuICAgICAgICBjb25zdCB7IGZpbHRlciA9ICcnIH0gPSB0aGlzLnN0YXRlO1xuXG4gICAgICAgIGlmICghZmlsdGVyKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgIGZpbHRlcmluZzogdHJ1ZSxcbiAgICAgICAgICAgIGZpbHRlckxvYWRpbmc6IHRydWVcbiAgICAgICAgfSk7XG5cbiAgICAgICAgbGV0IHBvc3RfYXJncyA9IHt9O1xuXG4gICAgICAgIGlmKCB0aGlzLnByb3BzLnBvc3RTdGF0dXMgKSB7XG4gICAgICAgICAgICBwb3N0X2FyZ3Muc3RhdHVzID0gdGhpcy5wcm9wcy5wb3N0U3RhdHVzO1xuICAgICAgICB9XG5cbiAgICAgICAgdGhpcy5nZXRQb3N0cyh7XG4gICAgICAgICAgICAuLi5wb3N0X2FyZ3NcbiAgICAgICAgfSkudGhlbigoKSA9PiB7XG4gICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICBmaWx0ZXJMb2FkaW5nOiBmYWxzZVxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFJlbmRlcnMgdGhlIFBvc3RTZWxlY3RvciBjb21wb25lbnQuXG4gICAgICovXG4gICAgcmVuZGVyKCkge1xuICAgICAgICBjb25zdCBwb3N0TGlzdCA9IHRoaXMuc3RhdGUuZmlsdGVyaW5nICYmICF0aGlzLnN0YXRlLmZpbHRlckxvYWRpbmcgPyB0aGlzLnN0YXRlLmZpbHRlclBvc3RzIDogW107XG5cbiAgICAgICAgY29uc3QgYWRkSWNvbiA9IDxJY29uIGljb249XCJwbHVzXCIgLz47XG4gICAgICAgIGNvbnN0IHJlbW92ZUljb24gPSA8SWNvbiBpY29uPVwibWludXNcIiAvPjtcblxuICAgICAgICBjb25zdCBzZWFyY2hpbnB1dHVuaXF1ZUlkID0gJ3NlYXJjaGlucHV0LScgKyBNYXRoLnJhbmRvbSgpLnRvU3RyaW5nKDM2KS5zdWJzdHIoMiwgMTYpO1xuXG4gICAgICAgIHJldHVybiAoXG4gICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sIGNvbXBvbmVudHMtcG9zdC1zZWxlY3RvclwiPlxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY29tcG9uZW50cy1iYXNlLWNvbnRyb2xfX2ZpZWxkLS1zZWxlY3RlZFwiPlxuICAgICAgICAgICAgICAgICAgICA8aDI+e19fKCdTZWFyY2ggUG9zdCcsICd2b2RpLWV4dGVuc2lvbnMnKX08L2gyPlxuICAgICAgICAgICAgICAgICAgICA8SXRlbUxpc3RcbiAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW1zPXsgWy4uLnRoaXMuc3RhdGUuc2VsZWN0ZWRQb3N0c10gfVxuICAgICAgICAgICAgICAgICAgICAgICAgbG9hZGluZz17dGhpcy5zdGF0ZS5pbml0aWFsTG9hZGluZ31cbiAgICAgICAgICAgICAgICAgICAgICAgIGFjdGlvbj17dGhpcy5yZW1vdmVQb3N0fVxuICAgICAgICAgICAgICAgICAgICAgICAgaWNvbj17cmVtb3ZlSWNvbn1cbiAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sX19maWVsZFwiPlxuICAgICAgICAgICAgICAgICAgICA8bGFiZWwgaHRtbEZvcj17c2VhcmNoaW5wdXR1bmlxdWVJZH0gY2xhc3NOYW1lPVwiY29tcG9uZW50cy1iYXNlLWNvbnRyb2xfX2xhYmVsXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICA8SWNvbiBpY29uPVwic2VhcmNoXCIgLz5cbiAgICAgICAgICAgICAgICAgICAgPC9sYWJlbD5cbiAgICAgICAgICAgICAgICAgICAgPGlucHV0XG4gICAgICAgICAgICAgICAgICAgICAgICBjbGFzc05hbWU9XCJjb21wb25lbnRzLXRleHQtY29udHJvbF9faW5wdXRcIlxuICAgICAgICAgICAgICAgICAgICAgICAgaWQ9e3NlYXJjaGlucHV0dW5pcXVlSWR9XG4gICAgICAgICAgICAgICAgICAgICAgICB0eXBlPVwic2VhcmNoXCJcbiAgICAgICAgICAgICAgICAgICAgICAgIHBsYWNlaG9sZGVyPXtfXygnUGxlYXNlIGVudGVyIHlvdXIgc2VhcmNoIHF1ZXJ5Li4uJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9e3RoaXMuc3RhdGUuZmlsdGVyfVxuICAgICAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9e3RoaXMuaGFuZGxlSW5wdXRGaWx0ZXJDaGFuZ2V9XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgIDxJdGVtTGlzdFxuICAgICAgICAgICAgICAgICAgICAgICAgaXRlbXM9e3Bvc3RMaXN0fVxuICAgICAgICAgICAgICAgICAgICAgICAgbG9hZGluZz17dGhpcy5zdGF0ZS5pbml0aWFsTG9hZGluZ3x8dGhpcy5zdGF0ZS5sb2FkaW5nfHx0aGlzLnN0YXRlLmZpbHRlckxvYWRpbmd9XG4gICAgICAgICAgICAgICAgICAgICAgICBmaWx0ZXJlZD17dGhpcy5zdGF0ZS5maWx0ZXJpbmd9XG4gICAgICAgICAgICAgICAgICAgICAgICBhY3Rpb249e3RoaXMuYWRkUG9zdH1cbiAgICAgICAgICAgICAgICAgICAgICAgIGljb249e2FkZEljb259XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgKTtcbiAgICB9XG59IiwiY29uc3QgeyBfXyB9ID0gd3AuaTE4bjtcbmNvbnN0IHsgQ29tcG9uZW50LCBDaGlsZHJlbiB9ID0gd3AuZWxlbWVudDtcbmNvbnN0IHsgUGFuZWwsIEJ1dHRvbiwgSWNvbiB9ID0gd3AuY29tcG9uZW50cztcblxuLyoqXG4gKiBSZXBlYXRlciBDb21wb25lbnRcbiAqL1xuZXhwb3J0IGNsYXNzIFJlcGVhdGVyIGV4dGVuZHMgQ29tcG9uZW50IHtcbiAgICAvKipcbiAgICAgKiBDb25zdHJ1Y3RvciBmb3IgUmVwZWF0ZXIgQ29tcG9uZW50LlxuICAgICAqIFNldHMgdXAgc3RhdGUsIGFuZCBjcmVhdGVzIGJpbmRpbmdzIGZvciBmdW5jdGlvbnMuXG4gICAgICogQHBhcmFtIG9iamVjdCBwcm9wcyAtIGN1cnJlbnQgY29tcG9uZW50IHByb3BlcnRpZXMuXG4gICAgICovXG4gICAgY29uc3RydWN0b3IocHJvcHMpIHtcbiAgICAgICAgc3VwZXIoLi4uYXJndW1lbnRzKTtcbiAgICAgICAgdGhpcy5wcm9wcyA9IHByb3BzO1xuXG4gICAgICAgIHRoaXMucmVuZGVyQWRkQnV0dG9uID0gdGhpcy5yZW5kZXJBZGRCdXR0b24uYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5yZW5kZXJSZW1vdmVCdXR0b24gPSB0aGlzLnJlbmRlclJlbW92ZUJ1dHRvbi5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLmhhbmRsZUFkZCA9IHRoaXMuaGFuZGxlQWRkLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMuaGFuZGxlUmVtb3ZlID0gdGhpcy5oYW5kbGVSZW1vdmUuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5yZW5kZXJDaGlsZHJlbkVsZW1lbnRzID0gdGhpcy5yZW5kZXJDaGlsZHJlbkVsZW1lbnRzLmJpbmQodGhpcyk7XG4gICAgfVxuXG4gICAgcmVuZGVyQWRkQnV0dG9uKCkge1xuICAgICAgICByZXR1cm4oXG4gICAgICAgICAgICA8QnV0dG9uIGlzRGVmYXVsdCBjbGFzc05hbWU9XCJidXR0b24tZnVsbHdpZHRoXCIgb25DbGljaz17dGhpcy5oYW5kbGVBZGR9PlxuICAgICAgICAgICAgICAgIDxJY29uIGljb249XCJwbHVzXCIgLz5cbiAgICAgICAgICAgIDwvQnV0dG9uPlxuICAgICAgICApO1xuICAgIH1cblxuICAgIHJlbmRlclJlbW92ZUJ1dHRvbigpIHtcbiAgICAgICAgcmV0dXJuKFxuICAgICAgICAgICAgPEJ1dHRvbiBpc0Rlc3RydWN0aXZlIGNsYXNzTmFtZT1cImJ1dHRvbi1yZW1vdmVcIiBvbkNsaWNrPXt0aGlzLmhhbmRsZVJlbW92ZX0+XG4gICAgICAgICAgICAgICAgPEljb24gaWNvbj1cImRpc21pc3NcIiAvPlxuICAgICAgICAgICAgPC9CdXR0b24+XG4gICAgICAgICk7XG4gICAgfVxuXG4gICAgaGFuZGxlQWRkKCkge1xuICAgICAgICBjb25zdCB7IGRlZmF1bHRWYWx1ZXMsIHVwZGF0ZVZhbHVlcyB9ID0gdGhpcy5wcm9wcztcbiAgICAgICAgY29uc3QgeyB2YWx1ZXMgfSA9IHRoaXMucHJvcHM7XG4gICAgICAgIGNvbnN0IGN1cnJlbnRfdmFsdWVzID0gdmFsdWVzID8gWyAuLi52YWx1ZXMsIHsgLi4uZGVmYXVsdFZhbHVlcyB9IF0gOiBbIHsgLi4uZGVmYXVsdFZhbHVlcyB9IF07XG4gICAgICAgIHVwZGF0ZVZhbHVlcyggY3VycmVudF92YWx1ZXMgKTtcbiAgICB9XG5cbiAgICBoYW5kbGVSZW1vdmUoIGluZGV4ICkge1xuICAgICAgICBjb25zdCB7IHVwZGF0ZVZhbHVlcyB9ID0gdGhpcy5wcm9wcztcbiAgICAgICAgY29uc3QgeyB2YWx1ZXMgfSA9IHRoaXMucHJvcHM7XG4gICAgICAgIGNvbnN0IGN1cnJlbnRfdmFsdWVzID0gdmFsdWVzLmZpbHRlciggKCB2YWx1ZSwgaSApID0+IGkgIT0gaW5kZXggKTtcbiAgICAgICAgdXBkYXRlVmFsdWVzKCBjdXJyZW50X3ZhbHVlcyApO1xuICAgIH1cblxuICAgIHJlbmRlckNoaWxkcmVuRWxlbWVudHMoKSB7XG4gICAgICAgIGNvbnN0IHsgY2hpbGRyZW4gfSA9IHRoaXMucHJvcHM7XG4gICAgICAgIGNvbnN0IHsgdmFsdWVzIH0gPSB0aGlzLnByb3BzO1xuXG4gICAgICAgIGlmKCAhIHZhbHVlcyApIHtcbiAgICAgICAgICAgIHJldHVybiBbXTtcbiAgICAgICAgfVxuXG4gICAgICAgIGNvbnN0IHJlbW92ZV9idXR0b24gPSB0aGlzLnJlbmRlclJlbW92ZUJ1dHRvbigpO1xuXG4gICAgICAgIHJldHVybiB2YWx1ZXMubWFwKCAoIHZhbHVlLCBpbmRleCApID0+IHtcbiAgICAgICAgICAgIGNvbnN0IHVwZGF0ZWRfY2hpbGRyZW4gPSBDaGlsZHJlbi5tYXAoY2hpbGRyZW4sICggY2hpbGQgKSA9PiB7XG4gICAgICAgICAgICAgICAgbGV0IGNoaWxkX3Byb3BzID0geyAuLi5jaGlsZC5wcm9wcyB9O1xuICAgICAgICAgICAgICAgIGlmKCB2YWx1ZXNbaW5kZXhdW2NoaWxkLnByb3BzLm5hbWVdICkge1xuICAgICAgICAgICAgICAgICAgICBjaGlsZF9wcm9wc1tjaGlsZC5wcm9wcy52YWx1ZWtleV0gPSB2YWx1ZXNbaW5kZXhdW2NoaWxkLnByb3BzLm5hbWVdO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBjaGlsZF9wcm9wc1tjaGlsZC5wcm9wcy50cmlnZ2VyX21ldGhvZF9uYW1lXSA9ICh2YWx1ZSkgPT4gY2hpbGQucHJvcHNbY2hpbGQucHJvcHMudHJpZ2dlcl9tZXRob2RfbmFtZV0odmFsdWUsIGluZGV4KTtcbiAgICAgICAgICAgICAgICByZXR1cm4gUmVhY3QuY2xvbmVFbGVtZW50KCBjaGlsZCwgeyAuLi5jaGlsZF9wcm9wcyB9ICk7XG4gICAgICAgICAgICB9ICk7XG5cbiAgICAgICAgICAgIGNvbnN0IHVwZGF0ZWRfcmVtb3ZlX2J1dHRvbiA9IFJlYWN0LmNsb25lRWxlbWVudCggcmVtb3ZlX2J1dHRvbiwgeyBrZXk6ICdyZXBlYXRlci1yZW1vdmUtJytpbmRleCwgb25DbGljazogKCkgPT4gcmVtb3ZlX2J1dHRvbi5wcm9wc1snb25DbGljayddKGluZGV4KSB9ICk7XG5cbiAgICAgICAgICAgIHJldHVybiBSZWFjdC5jcmVhdGVFbGVtZW50KCBQYW5lbCwgeyBrZXk6ICdyZXBlYXRlci1jaGlsZC0nK2luZGV4IH0sIFt1cGRhdGVkX2NoaWxkcmVuLCB1cGRhdGVkX3JlbW92ZV9idXR0b25dKTtcbiAgICAgICAgfSApO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFJlbmRlcnMgdGhlIFJlcGVhdGVyIGNvbXBvbmVudC5cbiAgICAgKi9cbiAgICByZW5kZXIoKSB7XG4gICAgICAgIHJldHVybiAoXG4gICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sIHJlcGVhdGVyLWNvbXBvbmVudFwiPlxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY29tcG9uZW50cy1iYXNlLWNvbnRyb2xfX2ZpZWxkXCI+XG4gICAgICAgICAgICAgICAgICAgIDxsYWJlbCBjbGFzc05hbWU9XCJjb21wb25lbnRzLWJhc2UtY29udHJvbF9fbGFiZWxcIj57dGhpcy5wcm9wcy50aXRsZX08L2xhYmVsPlxuICAgICAgICAgICAgICAgICAgICB7dGhpcy5yZW5kZXJDaGlsZHJlbkVsZW1lbnRzKCl9XG4gICAgICAgICAgICAgICAgICAgIHt0aGlzLnJlbmRlckFkZEJ1dHRvbigpfVxuICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICk7XG4gICAgfVxufSIsImNvbnN0IHsgYXBpRmV0Y2ggfSA9IHdwO1xuXG4vKipcbiAqIE1ha2VzIGEgZ2V0IHJlcXVlc3QgdG8gdGhlIFBvc3RUeXBlcyBlbmRwb2ludC5cbiAqXG4gKiBAcmV0dXJucyB7UHJvbWlzZTxhbnk+fVxuICovXG5leHBvcnQgY29uc3QgZ2V0UG9zdFR5cGVzID0gKCkgPT4ge1xuICAgIHJldHVybiBhcGlGZXRjaCggeyBwYXRoOiAnL3dwL3YyL3R5cGVzJyB9ICk7XG59O1xuXG4vKipcbiAqIE1ha2VzIGEgZ2V0IHJlcXVlc3QgdG8gdGhlIGRlc2lyZWQgcG9zdCB0eXBlIGFuZCBidWlsZHMgdGhlIHF1ZXJ5IHN0cmluZyBiYXNlZCBvbiBhbiBvYmplY3QuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd8Ym9vbGVhbn0gcmVzdEJhc2UgLSByZXN0IGJhc2UgZm9yIHRoZSBxdWVyeS5cbiAqIEBwYXJhbSB7b2JqZWN0fSBhcmdzXG4gKiBAcmV0dXJucyB7UHJvbWlzZTxhbnk+fVxuICovXG5leHBvcnQgY29uc3QgZ2V0UG9zdHMgPSAoeyByZXN0QmFzZSA9IGZhbHNlLCAuLi5hcmdzIH0pID0+IHtcbiAgICBjb25zdCBxdWVyeVN0cmluZyA9IE9iamVjdC5rZXlzKGFyZ3MpLm1hcChhcmcgPT4gYCR7YXJnfT0ke2FyZ3NbYXJnXX1gKS5qb2luKCcmJyk7XG5cbiAgICBsZXQgcGF0aCA9IGAvd3AvdjIvJHtyZXN0QmFzZX0/JHtxdWVyeVN0cmluZ30mX2VtYmVkYDtcbiAgICByZXR1cm4gYXBpRmV0Y2goIHsgcGF0aDogcGF0aCB9ICk7XG59O1xuXG4vKipcbiAqIE1ha2VzIGEgZ2V0IHJlcXVlc3QgdG8gdGhlIFBvc3RUeXBlIFRheG9ub21pZXMgZW5kcG9pbnQuXG4gKlxuICogQHJldHVybnMge1Byb21pc2U8YW55Pn1cbiAqL1xuZXhwb3J0IGNvbnN0IGdldFRheG9ub21pZXMgPSAoeyAuLi5hcmdzIH0pID0+IHtcbiAgICBjb25zdCBxdWVyeVN0cmluZyA9IE9iamVjdC5rZXlzKGFyZ3MpLm1hcChhcmcgPT4gYCR7YXJnfT0ke2FyZ3NbYXJnXX1gKS5qb2luKCcmJyk7XG5cbiAgICBsZXQgcGF0aCA9IGAvd3AvdjIvdGF4b25vbWllcz8ke3F1ZXJ5U3RyaW5nfSZfZW1iZWRgO1xuICAgIHJldHVybiBhcGlGZXRjaCggeyBwYXRoOiBwYXRoIH0gKTtcbn07XG5cbi8qKlxuICogTWFrZXMgYSBnZXQgcmVxdWVzdCB0byB0aGUgZGVzaXJlZCBwb3N0IHR5cGUgYW5kIGJ1aWxkcyB0aGUgcXVlcnkgc3RyaW5nIGJhc2VkIG9uIGFuIG9iamVjdC5cbiAqXG4gKiBAcGFyYW0ge3N0cmluZ3xib29sZWFufSByZXN0QmFzZSAtIHJlc3QgYmFzZSBmb3IgdGhlIHF1ZXJ5LlxuICogQHBhcmFtIHtvYmplY3R9IGFyZ3NcbiAqIEByZXR1cm5zIHtQcm9taXNlPGFueT59XG4gKi9cbmV4cG9ydCBjb25zdCBnZXRUZXJtcyA9ICh7IHJlc3RCYXNlID0gZmFsc2UsIC4uLmFyZ3MgfSkgPT4ge1xuICAgIGNvbnN0IHF1ZXJ5U3RyaW5nID0gT2JqZWN0LmtleXMoYXJncykubWFwKGFyZyA9PiBgJHthcmd9PSR7YXJnc1thcmddfWApLmpvaW4oJyYnKTtcblxuICAgIGxldCBwYXRoID0gYC93cC92Mi8ke3Jlc3RCYXNlfT8ke3F1ZXJ5U3RyaW5nfSZfZW1iZWRgO1xuICAgIHJldHVybiBhcGlGZXRjaCggeyBwYXRoOiBwYXRoIH0gKTtcbn07IiwiLyoqXG4gKiBSZXR1cm5zIGEgdW5pcXVlIGFycmF5IG9mIG9iamVjdHMgYmFzZWQgb24gYSBkZXNpcmVkIGtleS5cbiAqIEBwYXJhbSB7YXJyYXl9IGFyciAtIGFycmF5IG9mIG9iamVjdHMuXG4gKiBAcGFyYW0ge3N0cmluZ3xpbnR9IGtleSAtIGtleSB0byBmaWx0ZXIgb2JqZWN0cyBieVxuICovXG5leHBvcnQgY29uc3QgdW5pcXVlQnkgPSAoYXJyLCBrZXkpID0+IHtcbiAgICBsZXQga2V5cyA9IFtdO1xuICAgIHJldHVybiBhcnIuZmlsdGVyKGl0ZW0gPT4ge1xuICAgICAgICBpZiAoa2V5cy5pbmRleE9mKGl0ZW1ba2V5XSkgIT09IC0xKSB7XG4gICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgIH1cblxuICAgICAgICByZXR1cm4ga2V5cy5wdXNoKGl0ZW1ba2V5XSk7XG4gICAgfSk7XG59O1xuXG4vKipcbiAqIFJldHVybnMgYSB1bmlxdWUgYXJyYXkgb2Ygb2JqZWN0cyBiYXNlZCBvbiB0aGUgaWQgcHJvcGVydHkuXG4gKiBAcGFyYW0ge2FycmF5fSBhcnIgLSBhcnJheSBvZiBvYmplY3RzIHRvIGZpbHRlci5cbiAqIEByZXR1cm5zIHsqfVxuICovXG5leHBvcnQgY29uc3QgdW5pcXVlQnlJZCA9IGFyciA9PiB1bmlxdWVCeShhcnIsICdpZCcpO1xuXG4vKipcbiAqIERlYm91bmNlIGEgZnVuY3Rpb24gYnkgbGltaXRpbmcgaG93IG9mdGVuIGl0IGNhbiBydW4uXG4gKiBAcGFyYW0ge2Z1bmN0aW9ufSBmdW5jIC0gY2FsbGJhY2sgZnVuY3Rpb25cbiAqIEBwYXJhbSB7SW50ZWdlcn0gd2FpdCAtIFRpbWUgaW4gbWlsbGlzZWNvbmRzIGhvdyBsb25nIGl0IHNob3VsZCB3YWl0LlxuICogQHJldHVybnMge0Z1bmN0aW9ufVxuICovXG5leHBvcnQgY29uc3QgZGVib3VuY2UgPSAoZnVuYywgd2FpdCkgPT4ge1xuICAgIGxldCB0aW1lb3V0ID0gbnVsbDtcblxuICAgIHJldHVybiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNvbnN0IGNvbnRleHQgPSB0aGlzO1xuICAgICAgICBjb25zdCBhcmdzID0gYXJndW1lbnRzO1xuXG4gICAgICAgIGNvbnN0IGxhdGVyID0gKCkgPT4ge1xuICAgICAgICAgICAgZnVuYy5hcHBseShjb250ZXh0LCBhcmdzKTtcbiAgICAgICAgfTtcblxuICAgICAgICBjbGVhclRpbWVvdXQodGltZW91dCk7XG4gICAgICAgIHRpbWVvdXQgPSBzZXRUaW1lb3V0KGxhdGVyLCB3YWl0KTtcbiAgICB9XG59OyJdfQ==
