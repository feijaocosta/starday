(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

var _ShortcodeAtts = require("../components/ShortcodeAtts");

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
registerBlockType('vodi/video-section-aside-header', {
  title: __('Videos Section Aside Header Block', 'vodi-extensions'),
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
      section_background,
      section_style,
      shortcode_atts,
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
      minLimit: 5,
      attributes: { ...shortcode_atts
      },
      updateShortcodeAtts: onChangeShortcodeAtts
    })), wp.element.createElement(PanelBody, {
      title: __('Design Options', 'vodi-extensions'),
      initialOpen: false
    }, wp.element.createElement(_DesignOptions.DesignOptions, {
      attributes: { ...design_options
      },
      updateDesignOptions: onChangeDesignOptions
    }))), wp.element.createElement(Disabled, null, wp.element.createElement(ServerSideRender, {
      block: "vodi/video-section-aside-header",
      attributes: attributes
    })));
  },

  save() {
    // Rendering in PHP
    return null;
  }

});

},{"../components/DesignOptions":2,"../components/ShortcodeAtts":6}],2:[function(require,module,exports){
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

},{}],4:[function(require,module,exports){
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

},{"./Item":3}],5:[function(require,module,exports){
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

},{"../utils/api":8,"../utils/useful-funcs":9,"./ItemList":4}],6:[function(require,module,exports){
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

},{"./PostSelector":5,"./TermSelector":7}],7:[function(require,module,exports){
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

},{"../utils/api":8,"../utils/useful-funcs":9,"./ItemList":4}],8:[function(require,module,exports){
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9ibG9ja3MvdmlkZW8tc2VjdGlvbi1hc2lkZS1oZWFkZXIuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9jb21wb25lbnRzL0Rlc2lnbk9wdGlvbnMuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9jb21wb25lbnRzL0l0ZW0uanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9jb21wb25lbnRzL0l0ZW1MaXN0LmpzIiwic3JjL3BsdWdpbnMvdm9kaS1leHRlbnNpb25zL2Fzc2V0cy9lc25leHQvY29tcG9uZW50cy9Qb3N0U2VsZWN0b3IuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9jb21wb25lbnRzL1Nob3J0Y29kZUF0dHMuanMiLCJzcmMvcGx1Z2lucy92b2RpLWV4dGVuc2lvbnMvYXNzZXRzL2VzbmV4dC9jb21wb25lbnRzL1Rlcm1TZWxlY3Rvci5qcyIsInNyYy9wbHVnaW5zL3ZvZGktZXh0ZW5zaW9ucy9hc3NldHMvZXNuZXh0L3V0aWxzL2FwaS5qcyIsInNyYy9wbHVnaW5zL3ZvZGktZXh0ZW5zaW9ucy9hc3NldHMvZXNuZXh0L3V0aWxzL3VzZWZ1bC1mdW5jcy5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTs7O0FDQUE7O0FBQ0E7O0FBRUEsTUFBTTtBQUFFLEVBQUE7QUFBRixJQUFTLEVBQUUsQ0FBQyxJQUFsQjtBQUNBLE1BQU07QUFBRSxFQUFBO0FBQUYsSUFBd0IsRUFBRSxDQUFDLE1BQWpDO0FBQ0EsTUFBTTtBQUFFLEVBQUE7QUFBRixJQUF3QixFQUFFLENBQUMsTUFBakM7QUFDQSxNQUFNO0FBQUUsRUFBQTtBQUFGLElBQWUsRUFB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O0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7O0FBQ08sTUFBTSxRQUFRLEdBQUcsQ0FBQyxJQUFELEVBQU8sSUFBUCxLQUFnQjtBQUNwQyxNQUFJLE9BQU8sR0FBRyxJQUFkO0FBRUEsU0FBTyxZQUFZO0FBQ2YsVUFBTSxPQUFPLEdBQUcsSUFBaEI7QUFDQSxVQUFNLElBQUksR0FBRyxTQUFiOztBQUVBLFVBQU0sS0FBSyxHQUFHLE1BQU07QUFDaEIsTUFBQSxJQUFJLENBQUMsS0FBTCxDQUFXLE9BQVgsRUFBb0IsSUFBcEI7QUFDSCxLQUZEOztBQUlBLElBQUEsWUFBWSxDQUFDLE9BQUQsQ0FBWjtBQUNBLElBQUEsT0FBTyxHQUFHLFVBQVUsQ0FBQyxLQUFELEVBQVEsSUFBUixDQUFwQjtBQUNILEdBVkQ7QUFXSCxDQWRNIiwiZmlsZSI6ImdlbmVyYXRlZC5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24oKXtmdW5jdGlvbiByKGUsbix0KXtmdW5jdGlvbiBvKGksZil7aWYoIW5baV0pe2lmKCFlW2ldKXt2YXIgYz1cImZ1bmN0aW9uXCI9PXR5cGVvZiByZXF1aXJlJiZyZXF1aXJlO2lmKCFmJiZjKXJldHVybiBjKGksITApO2lmKHUpcmV0dXJuIHUoaSwhMCk7dmFyIGE9bmV3IEVycm9yKFwiQ2Fubm90IGZpbmQgbW9kdWxlICdcIitpK1wiJ1wiKTt0aHJvdyBhLmNvZGU9XCJNT0RVTEVfTk9UX0ZPVU5EXCIsYX12YXIgcD1uW2ldPXtleHBvcnRzOnt9fTtlW2ldWzBdLmNhbGwocC5leHBvcnRzLGZ1bmN0aW9uKHIpe3ZhciBuPWVbaV1bMV1bcl07cmV0dXJuIG8obnx8cil9LHAscC5leHBvcnRzLHIsZSxuLHQpfXJldHVybiBuW2ldLmV4cG9ydHN9Zm9yKHZhciB1PVwiZnVuY3Rpb25cIj09dHlwZW9mIHJlcXVpcmUmJnJlcXVpcmUsaT0wO2k8dC5sZW5ndGg7aSsrKW8odFtpXSk7cmV0dXJuIG99cmV0dXJuIHJ9KSgpIiwiaW1wb3J0IHsgU2hvcnRjb2RlQXR0cyB9IGZyb20gJy4uL2NvbXBvbmVudHMvU2hvcnRjb2RlQXR0cyc7XG5pbXBvcnQgeyBEZXNpZ25PcHRpb25zIH0gZnJvbSAnLi4vY29tcG9uZW50cy9EZXNpZ25PcHRpb25zJztcblxuY29uc3QgeyBfXyB9ID0gd3AuaTE4bjtcbmNvbnN0IHsgcmVnaXN0ZXJCbG9ja1R5cGUgfSA9IHdwLmJsb2NrcztcbmNvbnN0IHsgSW5zcGVjdG9yQ29udHJvbHMgfSA9IHdwLmVkaXRvcjtcbmNvbnN0IHsgRnJhZ21lbnQgfSA9IHdwLmVsZW1lbnQ7XG5jb25zdCB7IFNlcnZlclNpZGVSZW5kZXIsIERpc2FibGVkLCBQYW5lbEJvZHksIFRleHRDb250cm9sLCBTZWxlY3RDb250cm9sIH0gPSB3cC5jb21wb25lbnRzO1xuXG5yZWdpc3RlckJsb2NrVHlwZSggJ3ZvZGkvdmlkZW8tc2VjdGlvbi1hc2lkZS1oZWFkZXInLCB7XG4gICAgdGl0bGU6IF9fKCdWaWRlb3MgU2VjdGlvbiBBc2lkZSBIZWFkZXIgQmxvY2snLCAndm9kaS1leHRlbnNpb25zJyksXG5cbiAgICBpY29uOiAndmlkZW8tYWx0MicsXG5cbiAgICBjYXRlZ29yeTogJ3ZvZGktYmxvY2tzJyxcblxuICAgIGVkaXQ6ICggKCBwcm9wcyApID0+IHtcbiAgICAgICAgY29uc3QgeyBhdHRyaWJ1dGVzLCBzZXRBdHRyaWJ1dGVzIH0gPSBwcm9wcztcbiAgICAgICAgY29uc3QgeyBzZWN0aW9uX3RpdGxlLCBzZWN0aW9uX3N1YnRpdGxlLCBhY3Rpb25fdGV4dCwgYWN0aW9uX2xpbmssIHNlY3Rpb25fYmFja2dyb3VuZCwgc2VjdGlvbl9zdHlsZSwgc2hvcnRjb2RlX2F0dHMsIGRlc2lnbl9vcHRpb25zIH0gPSBhdHRyaWJ1dGVzO1xuXG4gICAgICAgIGNvbnN0IG9uQ2hhbmdlU2VjdGlvblRpdGxlID0gbmV3U2VjdGlvblRpdGxlID0+IHtcbiAgICAgICAgICAgIHNldEF0dHJpYnV0ZXMoIHsgc2VjdGlvbl90aXRsZTogbmV3U2VjdGlvblRpdGxlIH0gKTtcbiAgICAgICAgfTtcblxuICAgICAgICBjb25zdCBvbkNoYW5nZVNlY3Rpb25TdWJ0aXRsZSA9IG5ld1NlY3Rpb25TdWJ0aXRsZSA9PiB7XG4gICAgICAgICAgICBzZXRBdHRyaWJ1dGVzKCB7IHNlY3Rpb25fc3VidGl0bGU6IG5ld1NlY3Rpb25TdWJ0aXRsZSB9ICk7XG4gICAgICAgIH07XG4gICAgICAgIFxuICAgICAgICBjb25zdCBvbkNoYW5nZUFjdGlvblRleHQgPSBuZXdBY3Rpb25UZXh0ID0+IHtcbiAgICAgICAgICAgIHNldEF0dHJpYnV0ZXMoIHsgYWN0aW9uX3RleHQ6IG5ld0FjdGlvblRleHQgfSApO1xuICAgICAgICB9O1xuXG4gICAgICAgIGNvbnN0IG9uQ2hhbmdlQWN0aW9uTGluayA9IG5ld0FjdGlvbkxpbmsgPT4ge1xuICAgICAgICAgICAgc2V0QXR0cmlidXRlcyggeyBhY3Rpb25fbGluazogbmV3QWN0aW9uTGluayB9ICk7XG4gICAgICAgIH07XG5cbiAgICAgICAgY29uc3Qgb25DaGFuZ2VTZWN0aW9uQmFja2dyb3VuZCA9IG5ld1NlY3Rpb25CYWNrZ3JvdW5kID0+IHtcbiAgICAgICAgICAgIHNldEF0dHJpYnV0ZXMoIHsgc2VjdGlvbl9iYWNrZ3JvdW5kOiBuZXdTZWN0aW9uQmFja2dyb3VuZCB9ICk7XG4gICAgICAgIH07XG5cbiAgICAgICAgY29uc3Qgb25DaGFuZ2VTZWN0aW9uU3R5bGUgPSBuZXdTZWN0aW9uU3R5bGUgPT4ge1xuICAgICAgICAgICAgc2V0QXR0cmlidXRlcyggeyBzZWN0aW9uX3N0eWxlOiBuZXdTZWN0aW9uU3R5bGUgfSApO1xuICAgICAgICB9O1xuXG4gICAgICAgIGNvbnN0IG9uQ2hhbmdlU2hvcnRjb2RlQXR0cyA9IG5ld1Nob3J0Y29kZUF0dHMgPT4ge1xuICAgICAgICAgICAgc2V0QXR0cmlidXRlcyggeyBzaG9ydGNvZGVfYXR0czogeyAuLi5zaG9ydGNvZGVfYXR0cywgLi4ubmV3U2hvcnRjb2RlQXR0cyB9IH0gKTtcbiAgICAgICAgfTtcblxuICAgICAgICBjb25zdCBvbkNoYW5nZURlc2lnbk9wdGlvbnMgPSBuZXdEZXNpZ25PcHRpb25zID0+IHtcbiAgICAgICAgICAgIHNldEF0dHJpYnV0ZXMoIHsgZGVzaWduX29wdGlvbnM6IHsgLi4uZGVzaWduX29wdGlvbnMsIC4uLm5ld0Rlc2lnbk9wdGlvbnMgfSB9ICk7XG4gICAgICAgIH07XG5cbiAgICAgICAgcmV0dXJuIChcbiAgICAgICAgICAgIDxGcmFnbWVudD5cbiAgICAgICAgICAgICAgICA8SW5zcGVjdG9yQ29udHJvbHM+XG4gICAgICAgICAgICAgICAgICAgIDxUZXh0Q29udHJvbFxuICAgICAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdTZWN0aW9uIFRpdGxlJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBzZWN0aW9uX3RpdGxlIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgb25DaGFuZ2VTZWN0aW9uVGl0bGUgfVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICA8VGV4dENvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnU2VjdGlvbiBTdWJ0aXRsZScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgc2VjdGlvbl9zdWJ0aXRsZSB9XG4gICAgICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IG9uQ2hhbmdlU2VjdGlvblN1YnRpdGxlIH1cbiAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICAgICAgPFRleHRDb250cm9sXG4gICAgICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ0FjdGlvbiBUZXh0JywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBhY3Rpb25fdGV4dCB9XG4gICAgICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IG9uQ2hhbmdlQWN0aW9uVGV4dCB9XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgIDxUZXh0Q29udHJvbFxuICAgICAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdBY3Rpb24gTGluaycsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgYWN0aW9uX2xpbmsgfVxuICAgICAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyBvbkNoYW5nZUFjdGlvbkxpbmsgfVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICA8U2VsZWN0Q29udHJvbFxuICAgICAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdCYWNrZ3JvdW5kIENvbG9yJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBzZWN0aW9uX2JhY2tncm91bmQgfVxuICAgICAgICAgICAgICAgICAgICAgICAgb3B0aW9ucz17IFtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB7IGxhYmVsOiBfXygnRGVmYXVsdCcsICd2b2RpLWV4dGVuc2lvbnMnKSwgdmFsdWU6ICcnIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgeyBsYWJlbDogX18oJ0RhcmsnLCAndm9kaS1leHRlbnNpb25zJyksIHZhbHVlOiAnZGFyaycgfSxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB7IGxhYmVsOiBfXygnTW9yZSBEYXJrJywgJ3ZvZGktZXh0ZW5zaW9ucycpLCB2YWx1ZTogJ2RhcmsgbW9yZS1kYXJrJyB9LFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHsgbGFiZWw6IF9fKCdMZXNzIERhcmsnLCAndm9kaS1leHRlbnNpb25zJyksIHZhbHVlOiAnZGFyayBsZXNzLWRhcmsnIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgeyBsYWJlbDogX18oJ0xpZ2h0JywgJ3ZvZGktZXh0ZW5zaW9ucycpLCB2YWx1ZTogJ2xpZ2h0JyB9LFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHsgbGFiZWw6IF9fKCdNb3JlIExpZ2h0JywgJ3ZvZGktZXh0ZW5zaW9ucycpLCB2YWx1ZTogJ2xpZ2h0IG1vcmUtbGlnaHQnIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICBdIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgb25DaGFuZ2VTZWN0aW9uQmFja2dyb3VuZCB9XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgIDxTZWxlY3RDb250cm9sXG4gICAgICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ1N0eWxlJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBzZWN0aW9uX3N0eWxlIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIG9wdGlvbnM9eyBbXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgeyBsYWJlbDogX18oJ1N0eWxlIDEnLCAndm9kaS1leHRlbnNpb25zJyksIHZhbHVlOiAnJyB9LFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHsgbGFiZWw6IF9fKCdTdHlsZSAyJywgJ3ZvZGktZXh0ZW5zaW9ucycpLCB2YWx1ZTogJ3N0eWxlLTInIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICBdIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgb25DaGFuZ2VTZWN0aW9uU3R5bGUgfVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICA8UGFuZWxCb2R5XG4gICAgICAgICAgICAgICAgICAgICAgICB0aXRsZT17X18oJ1ZpZGVvcyBBdHRyaWJ1dGVzJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgaW5pdGlhbE9wZW49eyB0cnVlIH1cbiAgICAgICAgICAgICAgICAgICAgPlxuICAgICAgICAgICAgICAgICAgICAgICAgPFNob3J0Y29kZUF0dHNcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBwb3N0VHlwZSA9ICd2aWRlbydcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjYXRUYXhvbm9teSA9ICd2aWRlb19jYXQnXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGFnVGF4b25vbXkgPSAndmlkZW9fdGFnJ1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGhpZGVGaWVsZHMgPSB7IFsnY29sdW1ucycsICd0b3BfcmF0ZWQnXSB9XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbWluTGltaXQgPSB7IDUgfVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGF0dHJpYnV0ZXMgPSB7IHsgLi4uc2hvcnRjb2RlX2F0dHMgfSB9XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdXBkYXRlU2hvcnRjb2RlQXR0cyA9IHsgb25DaGFuZ2VTaG9ydGNvZGVBdHRzIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgIDwvUGFuZWxCb2R5PlxuICAgICAgICAgICAgICAgICAgICA8UGFuZWxCb2R5XG4gICAgICAgICAgICAgICAgICAgICAgICB0aXRsZT17X18oJ0Rlc2lnbiBPcHRpb25zJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgaW5pdGlhbE9wZW49eyBmYWxzZSB9XG4gICAgICAgICAgICAgICAgICAgID5cbiAgICAgICAgICAgICAgICAgICAgICAgIDxEZXNpZ25PcHRpb25zXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYXR0cmlidXRlcyA9IHsgeyAuLi5kZXNpZ25fb3B0aW9ucyB9IH1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB1cGRhdGVEZXNpZ25PcHRpb25zID0geyBvbkNoYW5nZURlc2lnbk9wdGlvbnMgfVxuICAgICAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICAgICAgPC9QYW5lbEJvZHk+XG4gICAgICAgICAgICAgICAgPC9JbnNwZWN0b3JDb250cm9scz5cbiAgICAgICAgICAgICAgICA8RGlzYWJsZWQ+XG4gICAgICAgICAgICAgICAgICAgIDxTZXJ2ZXJTaWRlUmVuZGVyXG4gICAgICAgICAgICAgICAgICAgICAgICBibG9jaz1cInZvZGkvdmlkZW8tc2VjdGlvbi1hc2lkZS1oZWFkZXJcIlxuICAgICAgICAgICAgICAgICAgICAgICAgYXR0cmlidXRlcz17IGF0dHJpYnV0ZXMgfVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDwvRGlzYWJsZWQ+XG4gICAgICAgICAgICA8L0ZyYWdtZW50PlxuICAgICAgICApO1xuICAgIH0gKSxcblxuICAgIHNhdmUoKSB7XG4gICAgICAgIC8vIFJlbmRlcmluZyBpbiBQSFBcbiAgICAgICAgcmV0dXJuIG51bGw7XG4gICAgfSxcbn0gKTsiLCJjb25zdCB7IF9fIH0gPSB3cC5pMThuO1xuY29uc3QgeyBDb21wb25lbnQgfSA9IHdwLmVsZW1lbnQ7XG5jb25zdCB7IFJhbmdlQ29udHJvbCB9ID0gd3AuY29tcG9uZW50cztcblxuLyoqXG4gKiBEZXNpZ25PcHRpb25zIENvbXBvbmVudFxuICovXG5leHBvcnQgY2xhc3MgRGVzaWduT3B0aW9ucyBleHRlbmRzIENvbXBvbmVudCB7XG4gICAgLyoqXG4gICAgICogQ29uc3RydWN0b3IgZm9yIERlc2lnbk9wdGlvbnMgQ29tcG9uZW50LlxuICAgICAqIFNldHMgdXAgc3RhdGUsIGFuZCBjcmVhdGVzIGJpbmRpbmdzIGZvciBmdW5jdGlvbnMuXG4gICAgICogQHBhcmFtIG9iamVjdCBwcm9wcyAtIGN1cnJlbnQgY29tcG9uZW50IHByb3BlcnRpZXMuXG4gICAgICovXG4gICAgY29uc3RydWN0b3IocHJvcHMpIHtcbiAgICAgICAgc3VwZXIoLi4uYXJndW1lbnRzKTtcbiAgICAgICAgdGhpcy5wcm9wcyA9IHByb3BzO1xuXG4gICAgICAgIHRoaXMub25DaGFuZ2VQYWRkaW5nVG9wID0gdGhpcy5vbkNoYW5nZVBhZGRpbmdUb3AuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZVBhZGRpbmdCb3R0b20gPSB0aGlzLm9uQ2hhbmdlUGFkZGluZ0JvdHRvbS5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlUGFkZGluZ0xlZnQgPSB0aGlzLm9uQ2hhbmdlUGFkZGluZ0xlZnQuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZVBhZGRpbmdSaWdodCA9IHRoaXMub25DaGFuZ2VQYWRkaW5nUmlnaHQuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZU1hcmdpblRvcCA9IHRoaXMub25DaGFuZ2VNYXJnaW5Ub3AuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZU1hcmdpbkJvdHRvbSA9IHRoaXMub25DaGFuZ2VNYXJnaW5Cb3R0b20uYmluZCh0aGlzKTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZVBhZGRpbmdUb3AoIG5ld29uQ2hhbmdlUGFkZGluZ1RvcCApIHtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVEZXNpZ25PcHRpb25zKHtcbiAgICAgICAgICAgIHBhZGRpbmdfdG9wOiBuZXdvbkNoYW5nZVBhZGRpbmdUb3BcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VQYWRkaW5nQm90dG9tKCBuZXdvbkNoYW5nZVBhZGRpbmdCb3R0b20gKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlRGVzaWduT3B0aW9ucyh7XG4gICAgICAgICAgICBwYWRkaW5nX2JvdHRvbTogbmV3b25DaGFuZ2VQYWRkaW5nQm90dG9tXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlUGFkZGluZ0xlZnQoIG5ld29uQ2hhbmdlUGFkZGluZ0xlZnQgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlRGVzaWduT3B0aW9ucyh7XG4gICAgICAgICAgICBwYWRkaW5nX2xlZnQ6IG5ld29uQ2hhbmdlUGFkZGluZ0xlZnRcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VQYWRkaW5nUmlnaHQoIG5ld29uQ2hhbmdlUGFkZGluZ1JpZ2h0ICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZURlc2lnbk9wdGlvbnMoe1xuICAgICAgICAgICAgcGFkZGluZ19yaWdodDogbmV3b25DaGFuZ2VQYWRkaW5nUmlnaHRcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VNYXJnaW5Ub3AoIG5ld29uQ2hhbmdlTWFyZ2luVG9wICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZURlc2lnbk9wdGlvbnMoe1xuICAgICAgICAgICAgbWFyZ2luX3RvcDogbmV3b25DaGFuZ2VNYXJnaW5Ub3BcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VNYXJnaW5Cb3R0b20oIG5ld29uQ2hhbmdlTWFyZ2luQm90dG9tICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZURlc2lnbk9wdGlvbnMoe1xuICAgICAgICAgICAgbWFyZ2luX2JvdHRvbTogbmV3b25DaGFuZ2VNYXJnaW5Cb3R0b21cbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogUmVuZGVycyB0aGUgRGVzaWduT3B0aW9ucyBjb21wb25lbnQuXG4gICAgICovXG4gICAgcmVuZGVyKCkge1xuICAgICAgICBjb25zdCB7IGF0dHJpYnV0ZXMgfSA9IHRoaXMucHJvcHM7XG4gICAgICAgIGNvbnN0IHsgcGFkZGluZ190b3AsIHBhZGRpbmdfYm90dG9tLCBwYWRkaW5nX2xlZnQsIHBhZGRpbmdfcmlnaHQsIG1hcmdpbl90b3AsIG1hcmdpbl9ib3R0b20gfSA9IGF0dHJpYnV0ZXM7XG5cbiAgICAgICAgcmV0dXJuIChcbiAgICAgICAgICAgIDxkaXY+XG4gICAgICAgICAgICAgICAgPFJhbmdlQ29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ1BhZGRpbmcgVG9wIChweCknLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgcGFkZGluZ190b3AgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VQYWRkaW5nVG9wIH1cbiAgICAgICAgICAgICAgICAgICAgbWluPXsgMCB9XG4gICAgICAgICAgICAgICAgICAgIG1heD17IDEwMCB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8UmFuZ2VDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnUGFkZGluZyBCb3R0b20gKHB4KScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBwYWRkaW5nX2JvdHRvbSB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZVBhZGRpbmdCb3R0b20gfVxuICAgICAgICAgICAgICAgICAgICBtaW49eyAwIH1cbiAgICAgICAgICAgICAgICAgICAgbWF4PXsgMTAwIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDxSYW5nZUNvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdQYWRkaW5nIExlZnQgKHB4KScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBwYWRkaW5nX2xlZnQgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VQYWRkaW5nTGVmdCB9XG4gICAgICAgICAgICAgICAgICAgIG1pbj17IDAgfVxuICAgICAgICAgICAgICAgICAgICBtYXg9eyAxMDAgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPFJhbmdlQ29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ1BhZGRpbmcgUmlnaHQgKHB4KScsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBwYWRkaW5nX3JpZ2h0IH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlUGFkZGluZ1JpZ2h0IH1cbiAgICAgICAgICAgICAgICAgICAgbWluPXsgMCB9XG4gICAgICAgICAgICAgICAgICAgIG1heD17IDEwMCB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8UmFuZ2VDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnTWFyZ2luIFRvcCAocHgpJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IG1hcmdpbl90b3AgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VNYXJnaW5Ub3AgfVxuICAgICAgICAgICAgICAgICAgICBtaW49eyAtMTAwIH1cbiAgICAgICAgICAgICAgICAgICAgbWF4PXsgMTAwIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgIDxSYW5nZUNvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdNYXJnaW4gQm90dG9tIChweCknLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgbWFyZ2luX2JvdHRvbSB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZU1hcmdpbkJvdHRvbSB9XG4gICAgICAgICAgICAgICAgICAgIG1pbj17IC0xMDAgfVxuICAgICAgICAgICAgICAgICAgICBtYXg9eyAxMDAgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgKTtcbiAgICB9XG59IiwiXG4vKipcbiAqIEl0ZW0gQ29tcG9uZW50LlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSBpdGVtVGl0bGUgLSBDdXJyZW50IGl0ZW0gdGl0bGUuXG4gKiBAcGFyYW0ge2Z1bmN0aW9ufSBjbGlja0hhbmRsZXIgLSB0aGlzIGlzIHRoZSBoYW5kbGluZyBmdW5jdGlvbiBmb3IgdGhlIGFkZC9yZW1vdmUgZnVuY3Rpb25cbiAqIEBwYXJhbSB7SW50ZWdlcn0gaXRlbUlkIC0gQ3VycmVudCBpdGVtIElEXG4gKiBAcGFyYW0gaWNvblxuICogQHJldHVybnMgeyp9IEl0ZW0gSFRNTC5cbiAqL1xuZXhwb3J0IGNvbnN0IEl0ZW0gPSAoeyB0aXRsZTogeyByZW5kZXJlZDogaXRlbVRpdGxlIH0gPSB7fSwgbmFtZSwgY2xpY2tIYW5kbGVyLCBpZDogaXRlbUlkLCBpY29uIH0pID0+IChcbiAgICA8YXJ0aWNsZSBjbGFzc05hbWU9XCJpdGVtXCI+XG4gICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiaXRlbS1ib2R5XCI+XG4gICAgICAgICAgICA8aDMgY2xhc3NOYW1lPVwiaXRlbS10aXRsZVwiIHN0eWxlPXt7bWFyZ2luVG9wOiAnMCd9fT57aXRlbVRpdGxlfXtuYW1lfTwvaDM+XG4gICAgICAgIDwvZGl2PlxuICAgICAgICA8YnV0dG9uIG9uQ2xpY2s9eygpID0+IGNsaWNrSGFuZGxlcihpdGVtSWQpfT57aWNvbn08L2J1dHRvbj5cbiAgICA8L2FydGljbGU+XG4pOyIsImltcG9ydCB7IEl0ZW0gfSBmcm9tICcuL0l0ZW0nO1xuXG5jb25zdCB7IF9fIH0gPSB3cC5pMThuO1xuXG4vKipcbiAqIEl0ZW1MaXN0IENvbXBvbmVudFxuICogQHBhcmFtIG9iamVjdCBwcm9wcyAtIENvbXBvbmVudCBwcm9wcy5cbiAqIEByZXR1cm5zIHsqfVxuICogQGNvbnN0cnVjdG9yXG4gKi9cbmV4cG9ydCBjb25zdCBJdGVtTGlzdCA9IHByb3BzID0+IHtcbiAgICBjb25zdCB7IGZpbHRlcmVkID0gZmFsc2UsIGxvYWRpbmcgPSBmYWxzZSwgaXRlbXMgPSBbXSwgYWN0aW9uID0gKCkgPT4ge30sIGljb24gPSBudWxsIH0gPSBwcm9wcztcblxuICAgIGlmIChsb2FkaW5nKSB7XG4gICAgICAgIHJldHVybiA8cCBjbGFzc05hbWU9XCJsb2FkaW5nLWl0ZW1zXCI+e19fKCdMb2FkaW5nIC4uLicsICd2b2RpLWV4dGVuc2lvbnMnKX08L3A+O1xuICAgIH1cblxuICAgIGlmIChmaWx0ZXJlZCAmJiBpdGVtcy5sZW5ndGggPCAxKSB7XG4gICAgICAgIHJldHVybiAoXG4gICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cIml0ZW0tbGlzdFwiPlxuICAgICAgICAgICAgICAgIDxwPntfXygnWW91ciBxdWVyeSB5aWVsZGVkIG5vIHJlc3VsdHMsIHBsZWFzZSB0cnkgYWdhaW4uJywgJ3ZvZGktZXh0ZW5zaW9ucycpfTwvcD5cbiAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICApO1xuICAgIH1cblxuICAgIGlmICggISBpdGVtcyB8fCBpdGVtcy5sZW5ndGggPCAxICkge1xuICAgICAgICByZXR1cm4gPHAgY2xhc3NOYW1lPVwibm8taXRlbXNcIj57X18oJ05vdCBmb3VuZC4nLCAndm9kaS1leHRlbnNpb25zJyl9PC9wPlxuICAgIH1cblxuICAgIHJldHVybiAoXG4gICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiaXRlbS1saXN0XCI+XG4gICAgICAgICAgICB7aXRlbXMubWFwKChpdGVtKSA9PiA8SXRlbSBrZXk9e2l0ZW0uaWR9IHsuLi5pdGVtfSBjbGlja0hhbmRsZXI9e2FjdGlvbn0gaWNvbj17aWNvbn0gLz4pfVxuICAgICAgICA8L2Rpdj5cbiAgICApO1xufTsiLCJpbXBvcnQgeyBJdGVtTGlzdCB9IGZyb20gJy4vSXRlbUxpc3QnO1xuaW1wb3J0ICogYXMgYXBpIGZyb20gJy4uL3V0aWxzL2FwaSc7XG5pbXBvcnQgeyB1bmlxdWVCeUlkLCBkZWJvdW5jZSB9IGZyb20gJy4uL3V0aWxzL3VzZWZ1bC1mdW5jcyc7XG5cbmNvbnN0IHsgX18gfSA9IHdwLmkxOG47XG5jb25zdCB7IEljb24gfSA9IHdwLmNvbXBvbmVudHM7XG5jb25zdCB7IENvbXBvbmVudCB9ID0gd3AuZWxlbWVudDtcblxuLyoqXG4gKiBQb3N0U2VsZWN0b3IgQ29tcG9uZW50XG4gKi9cbmV4cG9ydCBjbGFzcyBQb3N0U2VsZWN0b3IgZXh0ZW5kcyBDb21wb25lbnQge1xuICAgIC8qKlxuICAgICAqIENvbnN0cnVjdG9yIGZvciBQb3N0U2VsZWN0b3IgQ29tcG9uZW50LlxuICAgICAqIFNldHMgdXAgc3RhdGUsIGFuZCBjcmVhdGVzIGJpbmRpbmdzIGZvciBmdW5jdGlvbnMuXG4gICAgICogQHBhcmFtIG9iamVjdCBwcm9wcyAtIGN1cnJlbnQgY29tcG9uZW50IHByb3BlcnRpZXMuXG4gICAgICovXG4gICAgY29uc3RydWN0b3IocHJvcHMpIHtcbiAgICAgICAgc3VwZXIoLi4uYXJndW1lbnRzKTtcbiAgICAgICAgdGhpcy5wcm9wcyA9IHByb3BzO1xuXG4gICAgICAgIHRoaXMuc3RhdGUgPSB7XG4gICAgICAgICAgICBwb3N0czogW10sXG4gICAgICAgICAgICBsb2FkaW5nOiBmYWxzZSxcbiAgICAgICAgICAgIHR5cGU6IHByb3BzLnBvc3RUeXBlIHx8ICdwb3N0JyxcbiAgICAgICAgICAgIHR5cGVzOiBbXSxcbiAgICAgICAgICAgIGZpbHRlcjogJycsXG4gICAgICAgICAgICBmaWx0ZXJMb2FkaW5nOiBmYWxzZSxcbiAgICAgICAgICAgIGZpbHRlclBvc3RzOiBbXSxcbiAgICAgICAgICAgIGluaXRpYWxMb2FkaW5nOiBmYWxzZSxcbiAgICAgICAgICAgIHNlbGVjdGVkUG9zdHM6IFtdLFxuICAgICAgICB9O1xuXG4gICAgICAgIHRoaXMuYWRkUG9zdCA9IHRoaXMuYWRkUG9zdC5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLnJlbW92ZVBvc3QgPSB0aGlzLnJlbW92ZVBvc3QuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5oYW5kbGVJbnB1dEZpbHRlckNoYW5nZSA9IHRoaXMuaGFuZGxlSW5wdXRGaWx0ZXJDaGFuZ2UuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5kb1Bvc3RGaWx0ZXIgPSBkZWJvdW5jZSh0aGlzLmRvUG9zdEZpbHRlci5iaW5kKHRoaXMpLCAzMDApO1xuICAgICAgICB0aGlzLmdldFNlbGVjdGVkUG9zdElkcyA9IHRoaXMuZ2V0U2VsZWN0ZWRQb3N0SWRzLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMuZ2V0U2VsZWN0ZWRQb3N0cyA9IHRoaXMuZ2V0U2VsZWN0ZWRQb3N0cy5iaW5kKHRoaXMpO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFdoZW4gdGhlIGNvbXBvbmVudCBtb3VudHMgaXQgY2FsbHMgdGhpcyBmdW5jdGlvbi5cbiAgICAgKiBGZXRjaGVzIHBvc3RzIHR5cGVzLCBzZWxlY3RlZCBwb3N0cyB0aGVuIG1ha2VzIGZpcnN0IGNhbGwgZm9yIHBvc3RzXG4gICAgICovXG4gICAgY29tcG9uZW50RGlkTW91bnQoKSB7XG4gICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgaW5pdGlhbExvYWRpbmc6IHRydWUsXG4gICAgICAgIH0pO1xuXG4gICAgICAgIGFwaS5nZXRQb3N0VHlwZXMoKVxuICAgICAgICAgICAgLnRoZW4oKCByZXNwb25zZSApID0+IHtcbiAgICAgICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICAgICAgdHlwZXM6IHJlc3BvbnNlXG4gICAgICAgICAgICAgICAgfSwgKCkgPT4ge1xuICAgICAgICAgICAgICAgICAgICB0aGlzLnJldHJpZXZlU2VsZWN0ZWRQb3N0cygpXG4gICAgICAgICAgICAgICAgICAgICAgICAudGhlbigoIHNlbGVjdGVkUG9zdHMgKSA9PiB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYoIHNlbGVjdGVkUG9zdHMgKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaW5pdGlhbExvYWRpbmc6IGZhbHNlLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0ZWRQb3N0czogc2VsZWN0ZWRQb3N0cyxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpbml0aWFsTG9hZGluZzogZmFsc2UsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBHZXRQb3N0cyB3cmFwcGVyLCBidWlsZHMgdGhlIHJlcXVlc3QgYXJndW1lbnQgYmFzZWQgc3RhdGUgYW5kIHBhcmFtZXRlcnMgcGFzc2VkL1xuICAgICAqIEBwYXJhbSB7b2JqZWN0fSBhcmdzIC0gZGVzaXJlZCBhcmd1bWVudHMgKGNhbiBiZSBlbXB0eSkuXG4gICAgICogQHJldHVybnMge1Byb21pc2U8VD59XG4gICAgICovXG4gICAgZ2V0UG9zdHMoYXJncyA9IHt9KSB7XG4gICAgICAgIGNvbnN0IHBvc3RJZHMgPSB0aGlzLmdldFNlbGVjdGVkUG9zdElkcygpO1xuXG4gICAgICAgIGNvbnN0IGRlZmF1bHRBcmdzID0ge1xuICAgICAgICAgICAgcGVyX3BhZ2U6IDEwLFxuICAgICAgICAgICAgdHlwZTogdGhpcy5zdGF0ZS50eXBlLFxuICAgICAgICAgICAgc2VhcmNoOiB0aGlzLnN0YXRlLmZpbHRlcixcbiAgICAgICAgfTtcblxuICAgICAgICBjb25zdCByZXF1ZXN0QXJndW1lbnRzID0ge1xuICAgICAgICAgICAgLi4uZGVmYXVsdEFyZ3MsXG4gICAgICAgICAgICAuLi5hcmdzXG4gICAgICAgIH07XG5cbiAgICAgICAgcmVxdWVzdEFyZ3VtZW50cy5yZXN0QmFzZSA9IHRoaXMuc3RhdGUudHlwZXNbdGhpcy5zdGF0ZS50eXBlXS5yZXN0X2Jhc2U7XG5cbiAgICAgICAgcmV0dXJuIGFwaS5nZXRQb3N0cyhyZXF1ZXN0QXJndW1lbnRzKVxuICAgICAgICAgICAgLnRoZW4ocmVzcG9uc2UgPT4ge1xuICAgICAgICAgICAgICAgIGlmIChyZXF1ZXN0QXJndW1lbnRzLnNlYXJjaCkge1xuICAgICAgICAgICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGZpbHRlclBvc3RzOiByZXNwb25zZS5maWx0ZXIoKHsgaWQgfSkgPT4gcG9zdElkcy5pbmRleE9mKGlkKSA9PT0gLTEpLFxuICAgICAgICAgICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgICAgICAgICByZXR1cm4gcmVzcG9uc2U7XG4gICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgICAgIHBvc3RzOiB1bmlxdWVCeUlkKFsuLi50aGlzLnN0YXRlLnBvc3RzLCAuLi5yZXNwb25zZV0pLFxuICAgICAgICAgICAgICAgIH0pO1xuXG4gICAgICAgICAgICAgICAgLy8gcmV0dXJuIHJlc3BvbnNlIHRvIGNvbnRpbnVlIHRoZSBjaGFpblxuICAgICAgICAgICAgICAgIHJldHVybiByZXNwb25zZTtcbiAgICAgICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEdldHMgdGhlIHNlbGVjdGVkIHBvc3RzIGJ5IGlkIGZyb20gdGhlIGBwb3N0c2Agc3RhdGUgb2JqZWN0IGFuZCBzb3J0cyB0aGVtIGJ5IHRoZWlyIHBvc2l0aW9uIGluIHRoZSBzZWxlY3RlZCBhcnJheS5cbiAgICAgKiBAcmV0dXJucyBBcnJheSBvZiBvYmplY3RzLlxuICAgICAqL1xuICAgIGdldFNlbGVjdGVkUG9zdElkcygpIHtcbiAgICAgICAgY29uc3QgeyBzZWxlY3RlZFBvc3RJZHMgfSA9IHRoaXMucHJvcHM7XG5cbiAgICAgICAgaWYoIHNlbGVjdGVkUG9zdElkcyApIHtcbiAgICAgICAgICAgIGNvbnN0IHBvc3RJZHMgPSBBcnJheS5pc0FycmF5KCBzZWxlY3RlZFBvc3RJZHMgKSA/IHNlbGVjdGVkUG9zdElkcyA6IHNlbGVjdGVkUG9zdElkcy5zcGxpdCgnLCcpO1xuICAgICAgICAgICAgcmV0dXJuIHBvc3RJZHM7XG4gICAgICAgIH1cblxuICAgICAgICByZXR1cm4gW107XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogR2V0cyB0aGUgc2VsZWN0ZWQgcG9zdHMgYnkgaWQgZnJvbSB0aGUgYHBvc3RzYCBzdGF0ZSBvYmplY3QgYW5kIHNvcnRzIHRoZW0gYnkgdGhlaXIgcG9zaXRpb24gaW4gdGhlIHNlbGVjdGVkIGFycmF5LlxuICAgICAqIEByZXR1cm5zIEFycmF5IG9mIG9iamVjdHMuXG4gICAgICovXG4gICAgZ2V0U2VsZWN0ZWRQb3N0cyggcG9zdElkcyApIHtcbiAgICAgICAgLy8gY29uc3QgZmlsdGVyUG9zdHNMaXN0ID0gdGhpcy5zdGF0ZS5maWx0ZXJpbmcgJiYgIXRoaXMuc3RhdGUuZmlsdGVyTG9hZGluZyA/IHRoaXMuc3RhdGUuZmlsdGVyUG9zdHMgOiBbXTtcbiAgICAgICAgY29uc3QgcG9zdExpc3QgPSB1bmlxdWVCeUlkKFtcbiAgICAgICAgICAgIC4uLnRoaXMuc3RhdGUuZmlsdGVyUG9zdHMsXG4gICAgICAgICAgICAuLi50aGlzLnN0YXRlLnBvc3RzXG4gICAgICAgIF0pO1xuICAgICAgICBjb25zdCBzZWxlY3RlZFBvc3RzID0gcG9zdExpc3RcbiAgICAgICAgICAgIC5maWx0ZXIoKHsgaWQgfSkgPT4gcG9zdElkcy5pbmRleE9mKGlkKSAhPT0gLTEpXG4gICAgICAgICAgICAuc29ydCgoYSwgYikgPT4ge1xuICAgICAgICAgICAgICAgIGNvbnN0IGFJbmRleCA9IHBvc3RJZHMuaW5kZXhPZihhLmlkKTtcbiAgICAgICAgICAgICAgICBjb25zdCBiSW5kZXggPSBwb3N0SWRzLmluZGV4T2YoYi5pZCk7XG5cbiAgICAgICAgICAgICAgICBpZiAoYUluZGV4ID4gYkluZGV4KSB7XG4gICAgICAgICAgICAgICAgICAgIHJldHVybiAxO1xuICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgIGlmIChhSW5kZXggPCBiSW5kZXgpIHtcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIC0xO1xuICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgIHJldHVybiAwO1xuICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICBzZWxlY3RlZFBvc3RzOiBzZWxlY3RlZFBvc3RzLFxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBNYWtlcyB0aGUgbmVjZXNzYXJ5IGFwaSBjYWxscyB0byBmZXRjaCB0aGUgc2VsZWN0ZWQgcG9zdHMgYW5kIHJldHVybnMgYSBwcm9taXNlLlxuICAgICAqIEByZXR1cm5zIHsqfVxuICAgICAqL1xuICAgIHJldHJpZXZlU2VsZWN0ZWRQb3N0cygpIHtcbiAgICAgICAgY29uc3QgeyBwb3N0VHlwZSwgc2VsZWN0ZWRQb3N0SWRzIH0gPSB0aGlzLnByb3BzO1xuICAgICAgICBjb25zdCB7IHR5cGVzIH0gPSB0aGlzLnN0YXRlO1xuXG4gICAgICAgIGNvbnN0IHBvc3RJZHMgPSB0aGlzLmdldFNlbGVjdGVkUG9zdElkcygpLmpvaW4oJywnKTtcblxuICAgICAgICBpZiAoICEgcG9zdElkcyApIHtcbiAgICAgICAgICAgIC8vIHJldHVybiBhIGZha2UgcHJvbWlzZSB0aGF0IGF1dG8gcmVzb2x2ZXMuXG4gICAgICAgICAgICByZXR1cm4gbmV3IFByb21pc2UoKHJlc29sdmUpID0+IHJlc29sdmUoKSk7XG4gICAgICAgIH1cblxuICAgICAgICBsZXQgcG9zdF9hcmdzID0ge1xuICAgICAgICAgICAgaW5jbHVkZTogcG9zdElkcyxcbiAgICAgICAgICAgIHBlcl9wYWdlOiAxMDAsXG4gICAgICAgICAgICBwb3N0VHlwZVxuICAgICAgICB9O1xuXG4gICAgICAgIGlmKCB0aGlzLnByb3BzLnBvc3RTdGF0dXMgKSB7XG4gICAgICAgICAgICBwb3N0X2FyZ3Muc3RhdHVzID0gdGhpcy5wcm9wcy5wb3N0U3RhdHVzO1xuICAgICAgICB9XG5cbiAgICAgICAgcmV0dXJuIHRoaXMuZ2V0UG9zdHMoe1xuICAgICAgICAgICAgLi4ucG9zdF9hcmdzXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEFkZHMgZGVzaXJlZCBwb3N0IGlkIHRvIHRoZSBzZWxlY3RlZFBvc3RJZHMgTGlzdFxuICAgICAqIEBwYXJhbSB7SW50ZWdlcn0gcG9zdF9pZFxuICAgICAqL1xuICAgIGFkZFBvc3QocG9zdF9pZCkge1xuICAgICAgICBpZiAodGhpcy5zdGF0ZS5maWx0ZXIpIHtcbiAgICAgICAgICAgIGNvbnN0IHBvc3QgPSB0aGlzLnN0YXRlLmZpbHRlclBvc3RzLmZpbHRlcihwID0+IHAuaWQgPT09IHBvc3RfaWQpO1xuICAgICAgICAgICAgY29uc3QgcG9zdHMgPSB1bmlxdWVCeUlkKFtcbiAgICAgICAgICAgICAgICAuLi50aGlzLnN0YXRlLnBvc3RzLFxuICAgICAgICAgICAgICAgIC4uLnBvc3RcbiAgICAgICAgICAgIF0pO1xuXG4gICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICBwb3N0c1xuICAgICAgICAgICAgfSk7XG4gICAgICAgIH1cblxuICAgICAgICBpZiggdGhpcy5wcm9wcy5zZWxlY3RTaW5nbGUgKSB7XG4gICAgICAgICAgICBjb25zdCBzZWxlY3RlZFBvc3RJZHMgPSBbIHBvc3RfaWQgXTtcbiAgICAgICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2VsZWN0ZWRQb3N0SWRzKCBzZWxlY3RlZFBvc3RJZHMgKTtcbiAgICAgICAgICAgIHRoaXMuZ2V0U2VsZWN0ZWRQb3N0cyggc2VsZWN0ZWRQb3N0SWRzICk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBjb25zdCBwb3N0SWRzID0gdGhpcy5nZXRTZWxlY3RlZFBvc3RJZHMoKTtcbiAgICAgICAgICAgIGNvbnN0IHNlbGVjdGVkUG9zdElkcyA9IFsgLi4ucG9zdElkcywgcG9zdF9pZCBdO1xuICAgICAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTZWxlY3RlZFBvc3RJZHMoIHNlbGVjdGVkUG9zdElkcyApO1xuICAgICAgICAgICAgdGhpcy5nZXRTZWxlY3RlZFBvc3RzKCBzZWxlY3RlZFBvc3RJZHMgKTtcbiAgICAgICAgfVxuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFJlbW92ZXMgZGVzaXJlZCBwb3N0IGlkIHRvIHRoZSBzZWxlY3RlZFBvc3RJZHMgTGlzdFxuICAgICAqIEBwYXJhbSB7SW50ZWdlcn0gcG9zdF9pZFxuICAgICAqL1xuICAgIHJlbW92ZVBvc3QocG9zdF9pZCkge1xuICAgICAgICBjb25zdCBwb3N0SWRzID0gdGhpcy5nZXRTZWxlY3RlZFBvc3RJZHMoKTtcbiAgICAgICAgY29uc3Qgc2VsZWN0ZWRQb3N0SWRzID0gWyAuLi5wb3N0SWRzIF0uZmlsdGVyKGlkID0+IGlkICE9PSBwb3N0X2lkKTtcbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTZWxlY3RlZFBvc3RJZHMoIHNlbGVjdGVkUG9zdElkcyApO1xuICAgICAgICB0aGlzLmdldFNlbGVjdGVkUG9zdHMoIHNlbGVjdGVkUG9zdElkcyApO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEhhbmRsZXMgdGhlIHNlYXJjaCBib3ggaW5wdXQgdmFsdWVcbiAgICAgKiBAcGFyYW0gc3RyaW5nIHR5cGUgLSBjb21lcyBmcm9tIHRoZSBldmVudCBvYmplY3QgdGFyZ2V0LlxuICAgICAqL1xuICAgIGhhbmRsZUlucHV0RmlsdGVyQ2hhbmdlKHsgdGFyZ2V0OiB7IHZhbHVlOmZpbHRlciA9ICcnIH0gPSB7fSB9ID0ge30pIHtcbiAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICBmaWx0ZXJcbiAgICAgICAgfSwgKCkgPT4ge1xuICAgICAgICAgICAgaWYgKCFmaWx0ZXIpIHtcbiAgICAgICAgICAgICAgICAvLyByZW1vdmUgZmlsdGVyZWQgcG9zdHNcbiAgICAgICAgICAgICAgICByZXR1cm4gdGhpcy5zZXRTdGF0ZSh7IGZpbHRlcmVkUG9zdHM6IFtdLCBmaWx0ZXJpbmc6IGZhbHNlIH0pO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICB0aGlzLmRvUG9zdEZpbHRlcigpO1xuICAgICAgICB9KVxuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEFjdHVhbCBhcGkgY2FsbCBmb3Igc2VhcmNoaW5nIGZvciBxdWVyeSwgdGhpcyBmdW5jdGlvbiBpcyBkZWJvdW5jZWQgaW4gY29uc3RydWN0b3IuXG4gICAgICovXG4gICAgZG9Qb3N0RmlsdGVyKCkge1xuICAgICAgICBjb25zdCB7IGZpbHRlciA9ICcnIH0gPSB0aGlzLnN0YXRlO1xuXG4gICAgICAgIGlmICghZmlsdGVyKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgIGZpbHRlcmluZzogdHJ1ZSxcbiAgICAgICAgICAgIGZpbHRlckxvYWRpbmc6IHRydWVcbiAgICAgICAgfSk7XG5cbiAgICAgICAgbGV0IHBvc3RfYXJncyA9IHt9O1xuXG4gICAgICAgIGlmKCB0aGlzLnByb3BzLnBvc3RTdGF0dXMgKSB7XG4gICAgICAgICAgICBwb3N0X2FyZ3Muc3RhdHVzID0gdGhpcy5wcm9wcy5wb3N0U3RhdHVzO1xuICAgICAgICB9XG5cbiAgICAgICAgdGhpcy5nZXRQb3N0cyh7XG4gICAgICAgICAgICAuLi5wb3N0X2FyZ3NcbiAgICAgICAgfSkudGhlbigoKSA9PiB7XG4gICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICBmaWx0ZXJMb2FkaW5nOiBmYWxzZVxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFJlbmRlcnMgdGhlIFBvc3RTZWxlY3RvciBjb21wb25lbnQuXG4gICAgICovXG4gICAgcmVuZGVyKCkge1xuICAgICAgICBjb25zdCBwb3N0TGlzdCA9IHRoaXMuc3RhdGUuZmlsdGVyaW5nICYmICF0aGlzLnN0YXRlLmZpbHRlckxvYWRpbmcgPyB0aGlzLnN0YXRlLmZpbHRlclBvc3RzIDogW107XG5cbiAgICAgICAgY29uc3QgYWRkSWNvbiA9IDxJY29uIGljb249XCJwbHVzXCIgLz47XG4gICAgICAgIGNvbnN0IHJlbW92ZUljb24gPSA8SWNvbiBpY29uPVwibWludXNcIiAvPjtcblxuICAgICAgICBjb25zdCBzZWFyY2hpbnB1dHVuaXF1ZUlkID0gJ3NlYXJjaGlucHV0LScgKyBNYXRoLnJhbmRvbSgpLnRvU3RyaW5nKDM2KS5zdWJzdHIoMiwgMTYpO1xuXG4gICAgICAgIHJldHVybiAoXG4gICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sIGNvbXBvbmVudHMtcG9zdC1zZWxlY3RvclwiPlxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY29tcG9uZW50cy1iYXNlLWNvbnRyb2xfX2ZpZWxkLS1zZWxlY3RlZFwiPlxuICAgICAgICAgICAgICAgICAgICA8aDI+e19fKCdTZWFyY2ggUG9zdCcsICd2b2RpLWV4dGVuc2lvbnMnKX08L2gyPlxuICAgICAgICAgICAgICAgICAgICA8SXRlbUxpc3RcbiAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW1zPXsgWy4uLnRoaXMuc3RhdGUuc2VsZWN0ZWRQb3N0c10gfVxuICAgICAgICAgICAgICAgICAgICAgICAgbG9hZGluZz17dGhpcy5zdGF0ZS5pbml0aWFsTG9hZGluZ31cbiAgICAgICAgICAgICAgICAgICAgICAgIGFjdGlvbj17dGhpcy5yZW1vdmVQb3N0fVxuICAgICAgICAgICAgICAgICAgICAgICAgaWNvbj17cmVtb3ZlSWNvbn1cbiAgICAgICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sX19maWVsZFwiPlxuICAgICAgICAgICAgICAgICAgICA8bGFiZWwgaHRtbEZvcj17c2VhcmNoaW5wdXR1bmlxdWVJZH0gY2xhc3NOYW1lPVwiY29tcG9uZW50cy1iYXNlLWNvbnRyb2xfX2xhYmVsXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICA8SWNvbiBpY29uPVwic2VhcmNoXCIgLz5cbiAgICAgICAgICAgICAgICAgICAgPC9sYWJlbD5cbiAgICAgICAgICAgICAgICAgICAgPGlucHV0XG4gICAgICAgICAgICAgICAgICAgICAgICBjbGFzc05hbWU9XCJjb21wb25lbnRzLXRleHQtY29udHJvbF9faW5wdXRcIlxuICAgICAgICAgICAgICAgICAgICAgICAgaWQ9e3NlYXJjaGlucHV0dW5pcXVlSWR9XG4gICAgICAgICAgICAgICAgICAgICAgICB0eXBlPVwic2VhcmNoXCJcbiAgICAgICAgICAgICAgICAgICAgICAgIHBsYWNlaG9sZGVyPXtfXygnUGxlYXNlIGVudGVyIHlvdXIgc2VhcmNoIHF1ZXJ5Li4uJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWU9e3RoaXMuc3RhdGUuZmlsdGVyfVxuICAgICAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9e3RoaXMuaGFuZGxlSW5wdXRGaWx0ZXJDaGFuZ2V9XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgICAgIDxJdGVtTGlzdFxuICAgICAgICAgICAgICAgICAgICAgICAgaXRlbXM9e3Bvc3RMaXN0fVxuICAgICAgICAgICAgICAgICAgICAgICAgbG9hZGluZz17dGhpcy5zdGF0ZS5pbml0aWFsTG9hZGluZ3x8dGhpcy5zdGF0ZS5sb2FkaW5nfHx0aGlzLnN0YXRlLmZpbHRlckxvYWRpbmd9XG4gICAgICAgICAgICAgICAgICAgICAgICBmaWx0ZXJlZD17dGhpcy5zdGF0ZS5maWx0ZXJpbmd9XG4gICAgICAgICAgICAgICAgICAgICAgICBhY3Rpb249e3RoaXMuYWRkUG9zdH1cbiAgICAgICAgICAgICAgICAgICAgICAgIGljb249e2FkZEljb259XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgKTtcbiAgICB9XG59IiwiaW1wb3J0IHsgUG9zdFNlbGVjdG9yIH0gZnJvbSAnLi9Qb3N0U2VsZWN0b3InO1xuaW1wb3J0IHsgVGVybVNlbGVjdG9yIH0gZnJvbSAnLi9UZXJtU2VsZWN0b3InO1xuXG5jb25zdCB7IF9fIH0gPSB3cC5pMThuO1xuY29uc3QgeyBDb21wb25lbnQgfSA9IHdwLmVsZW1lbnQ7XG5jb25zdCB7IFJhbmdlQ29udHJvbCwgU2VsZWN0Q29udHJvbCwgQ2hlY2tib3hDb250cm9sIH0gPSB3cC5jb21wb25lbnRzO1xuY29uc3QgeyBhcHBseUZpbHRlcnMgfSA9IHdwLmhvb2tzO1xuXG4vKipcbiAqIFNob3J0Y29kZUF0dHMgQ29tcG9uZW50XG4gKi9cbmV4cG9ydCBjbGFzcyBTaG9ydGNvZGVBdHRzIGV4dGVuZHMgQ29tcG9uZW50IHtcbiAgICAvKipcbiAgICAgKiBDb25zdHJ1Y3RvciBmb3IgU2hvcnRjb2RlQXR0cyBDb21wb25lbnQuXG4gICAgICogU2V0cyB1cCBzdGF0ZSwgYW5kIGNyZWF0ZXMgYmluZGluZ3MgZm9yIGZ1bmN0aW9ucy5cbiAgICAgKiBAcGFyYW0gb2JqZWN0IHByb3BzIC0gY3VycmVudCBjb21wb25lbnQgcHJvcGVydGllcy5cbiAgICAgKi9cbiAgICBjb25zdHJ1Y3Rvcihwcm9wcykge1xuICAgICAgICBzdXBlciguLi5hcmd1bWVudHMpO1xuICAgICAgICB0aGlzLnByb3BzID0gcHJvcHM7XG5cbiAgICAgICAgdGhpcy5vbkNoYW5nZUxpbWl0ID0gdGhpcy5vbkNoYW5nZUxpbWl0LmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VDb2x1bW5zID0gdGhpcy5vbkNoYW5nZUNvbHVtbnMuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZU9yZGVyYnkgPSB0aGlzLm9uQ2hhbmdlT3JkZXJieS5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlT3JkZXIgPSB0aGlzLm9uQ2hhbmdlT3JkZXIuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZUlkcyA9IHRoaXMub25DaGFuZ2VJZHMuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZUNhdGVnb3J5ID0gdGhpcy5vbkNoYW5nZUNhdGVnb3J5LmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMub25DaGFuZ2VHZW5yZSA9IHRoaXMub25DaGFuZ2VHZW5yZS5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlVGFnID0gdGhpcy5vbkNoYW5nZVRhZy5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLm9uQ2hhbmdlRmVhdHVyZWQgPSB0aGlzLm9uQ2hhbmdlRmVhdHVyZWQuYmluZCh0aGlzKTtcbiAgICAgICAgdGhpcy5vbkNoYW5nZVRvcFJhdGVkID0gdGhpcy5vbkNoYW5nZVRvcFJhdGVkLmJpbmQodGhpcyk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VMaW1pdCggbmV3TGltaXQgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2hvcnRjb2RlQXR0cyh7XG4gICAgICAgICAgICBsaW1pdDogbmV3TGltaXRcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VDb2x1bW5zKCBuZXdDb2x1bW5zICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZVNob3J0Y29kZUF0dHMoe1xuICAgICAgICAgICAgY29sdW1uczogbmV3Q29sdW1uc1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZU9yZGVyYnkoIG5ld09yZGVyYnkgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2hvcnRjb2RlQXR0cyh7XG4gICAgICAgICAgICBvcmRlcmJ5OiBuZXdPcmRlcmJ5XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlT3JkZXIoIG5ld09yZGVyICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZVNob3J0Y29kZUF0dHMoe1xuICAgICAgICAgICAgb3JkZXI6IG5ld09yZGVyXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlSWRzKCBuZXdJZHMgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2hvcnRjb2RlQXR0cyh7XG4gICAgICAgICAgICBpZHM6IG5ld0lkcy5qb2luKCcsJylcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgb25DaGFuZ2VDYXRlZ29yeSggbmV3Q2F0ZWdvcnkgKSB7XG4gICAgICAgIHRoaXMucHJvcHMudXBkYXRlU2hvcnRjb2RlQXR0cyh7XG4gICAgICAgICAgICBjYXRlZ29yeTogbmV3Q2F0ZWdvcnkuam9pbignLCcpXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlR2VucmUoIG5ld0dlbnJlICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZVNob3J0Y29kZUF0dHMoe1xuICAgICAgICAgICAgZ2VucmU6IG5ld0dlbnJlLmpvaW4oJywnKVxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBvbkNoYW5nZVRhZyggbmV3VGFnICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZVNob3J0Y29kZUF0dHMoe1xuICAgICAgICAgICAgdGFnOiBuZXdUYWcuam9pbignLCcpXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlRmVhdHVyZWQoIG5ld0ZlYXR1cmVkICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZVNob3J0Y29kZUF0dHMoe1xuICAgICAgICAgICAgZmVhdHVyZWQ6IG5ld0ZlYXR1cmVkXG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG9uQ2hhbmdlVG9wUmF0ZWQoIG5ld1RvcFJhdGVkICkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZVNob3J0Y29kZUF0dHMoe1xuICAgICAgICAgICAgdG9wX3JhdGVkOiBuZXdUb3BSYXRlZFxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBSZW5kZXJzIHRoZSBTaG9ydGNvZGVBdHRzIGNvbXBvbmVudC5cbiAgICAgKi9cbiAgICByZW5kZXIoKSB7XG4gICAgICAgIGNvbnN0IHsgYXR0cmlidXRlcywgcG9zdFR5cGUsIHBvc3RTdGF0dXMsIGNhdFRheG9ub215LCB0YWdUYXhvbm9teSwgbWluTGltaXQgPSAxLCBtYXhMaW1pdCA9IDIwLCBtaW5Db2x1bW5zID0gMSwgbWF4Q29sdW1ucyA9IDYsIGhpZGVGaWVsZHMgfSA9IHRoaXMucHJvcHM7XG4gICAgICAgIGNvbnN0IHsgbGltaXQsIGNvbHVtbnMsIG9yZGVyYnksIG9yZGVyLCBpZHMsIGNhdGVnb3J5LCBnZW5yZSwgdGFnLCBmZWF0dXJlZCwgdG9wX3JhdGVkIH0gPSBhdHRyaWJ1dGVzO1xuXG4gICAgICAgIHJldHVybiAoXG4gICAgICAgICAgICA8ZGl2PlxuICAgICAgICAgICAgICAgIHsgISggaGlkZUZpZWxkcyAmJiBoaWRlRmllbGRzLmluY2x1ZGVzKCdsaW1pdCcpICkgPyAoXG4gICAgICAgICAgICAgICAgPFJhbmdlQ29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ0xpbWl0JywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICB2YWx1ZT17IGxpbWl0IH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlTGltaXQgfVxuICAgICAgICAgICAgICAgICAgICBtaW49eyBhcHBseUZpbHRlcnMoICd2b2RpLmNvbXBvbmVudC5zaG9ydGNvZGVBdHRzLmxpbWl0Lm1pbicsIG1pbkxpbWl0ICkgfVxuICAgICAgICAgICAgICAgICAgICBtYXg9eyBhcHBseUZpbHRlcnMoICd2b2RpLmNvbXBvbmVudC5zaG9ydGNvZGVBdHRzLmxpbWl0Lm1heCcsIG1heExpbWl0ICkgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgKSA6ICcnIH1cbiAgICAgICAgICAgICAgICB7ICEoIGhpZGVGaWVsZHMgJiYgaGlkZUZpZWxkcy5pbmNsdWRlcygnY29sdW1ucycpICkgPyAoXG4gICAgICAgICAgICAgICAgPFJhbmdlQ29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ0NvbHVtbnMnLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgY29sdW1ucyB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZUNvbHVtbnMgfVxuICAgICAgICAgICAgICAgICAgICBtaW49eyBhcHBseUZpbHRlcnMoICd2b2RpLmNvbXBvbmVudC5zaG9ydGNvZGVBdHRzLmNvbHVtbnMubWluJywgbWluQ29sdW1ucyApIH1cbiAgICAgICAgICAgICAgICAgICAgbWF4PXsgYXBwbHlGaWx0ZXJzKCAndm9kaS5jb21wb25lbnQuc2hvcnRjb2RlQXR0cy5jb2x1bW5zLm1heCcsIG1heENvbHVtbnMgKSB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICApIDogJycgfVxuICAgICAgICAgICAgICAgIHsgISggaGlkZUZpZWxkcyAmJiBoaWRlRmllbGRzLmluY2x1ZGVzKCdvcmRlcmJ5JykgKSA/IChcbiAgICAgICAgICAgICAgICA8U2VsZWN0Q29udHJvbFxuICAgICAgICAgICAgICAgICAgICBsYWJlbD17X18oJ09yZGVyYnknLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIHZhbHVlPXsgb3JkZXJieSB9XG4gICAgICAgICAgICAgICAgICAgIG9wdGlvbnM9eyBhcHBseUZpbHRlcnMoICd2b2RpLmNvbXBvbmVudC5zaG9ydGNvZGVBdHRzLm9yZGVyYnkub3B0aW9ucycsIFtcbiAgICAgICAgICAgICAgICAgICAgICAgIHsgbGFiZWw6IF9fKCdUaXRsZScsICd2b2RpLWV4dGVuc2lvbnMnKSwgdmFsdWU6ICd0aXRsZScgfSxcbiAgICAgICAgICAgICAgICAgICAgICAgIHsgbGFiZWw6IF9fKCdEYXRlJywgJ3ZvZGktZXh0ZW5zaW9ucycpLCB2YWx1ZTogKCBwb3N0VHlwZSA9PT0gJ21vdmllJyA/ICdyZWxlYXNlX2RhdGUnIDogJ2RhdGUnICkgfSxcbiAgICAgICAgICAgICAgICAgICAgICAgIHsgbGFiZWw6IF9fKCdJRCcsICd2b2RpLWV4dGVuc2lvbnMnKSwgdmFsdWU6ICdpZCcgfSxcbiAgICAgICAgICAgICAgICAgICAgICAgIHsgbGFiZWw6IF9fKCdSYW5kb20nLCAndm9kaS1leHRlbnNpb25zJyksIHZhbHVlOiAncmFuZCcgfSxcbiAgICAgICAgICAgICAgICAgICAgXSwgdGhpcy5wcm9wcyApIH1cbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U9eyB0aGlzLm9uQ2hhbmdlT3JkZXJieSB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICApIDogJycgfVxuICAgICAgICAgICAgICAgIHsgISggaGlkZUZpZWxkcyAmJiBoaWRlRmllbGRzLmluY2x1ZGVzKCdvcmRlcicpICkgPyAoXG4gICAgICAgICAgICAgICAgPFNlbGVjdENvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdPcmRlcicsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgdmFsdWU9eyBvcmRlciB9XG4gICAgICAgICAgICAgICAgICAgIG9wdGlvbnM9eyBhcHBseUZpbHRlcnMoICd2b2RpLmNvbXBvbmVudC5zaG9ydGNvZGVBdHRzLm9yZGVyLm9wdGlvbnMnLCBbXG4gICAgICAgICAgICAgICAgICAgICAgICB7IGxhYmVsOiBfXygnQVNDJywgJ3ZvZGktZXh0ZW5zaW9ucycpLCB2YWx1ZTogJ0FTQycgfSxcbiAgICAgICAgICAgICAgICAgICAgICAgIHsgbGFiZWw6IF9fKCdERVNDJywgJ3ZvZGktZXh0ZW5zaW9ucycpLCB2YWx1ZTogJ0RFU0MnIH0sXG4gICAgICAgICAgICAgICAgICAgIF0sIHRoaXMucHJvcHMgKSB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZU9yZGVyIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICkgOiAnJyB9XG4gICAgICAgICAgICAgICAgeyAhKCBoaWRlRmllbGRzICYmIGhpZGVGaWVsZHMuaW5jbHVkZXMoJ2lkcycpICkgPyAoXG4gICAgICAgICAgICAgICAgPFBvc3RTZWxlY3RvclxuICAgICAgICAgICAgICAgICAgICBwb3N0VHlwZSA9IHsgcG9zdFR5cGUgfVxuICAgICAgICAgICAgICAgICAgICBwb3N0U3RhdHVzID0geyBwb3N0U3RhdHVzIH1cbiAgICAgICAgICAgICAgICAgICAgc2VsZWN0ZWRQb3N0SWRzPXsgaWRzID8gaWRzLnNwbGl0KCcsJykubWFwKE51bWJlcikgOiBbXSB9XG4gICAgICAgICAgICAgICAgICAgIHVwZGF0ZVNlbGVjdGVkUG9zdElkcz17IHRoaXMub25DaGFuZ2VJZHMgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgKSA6ICcnIH1cbiAgICAgICAgICAgICAgICB7ICggcG9zdFR5cGUgPT09ICd2aWRlbycgKSAmJiBjYXRUYXhvbm9teSAmJiAhKCBoaWRlRmllbGRzICYmIGhpZGVGaWVsZHMuaW5jbHVkZXMoJ2NhdGVnb3J5JykgKSA/IChcbiAgICAgICAgICAgICAgICA8VGVybVNlbGVjdG9yXG4gICAgICAgICAgICAgICAgICAgIHBvc3RUeXBlID0geyBwb3N0VHlwZSB9XG4gICAgICAgICAgICAgICAgICAgIHRheG9ub215ID0geyBjYXRUYXhvbm9teSB9XG4gICAgICAgICAgICAgICAgICAgIHRpdGxlID0geyBfXygnU2VhcmNoIENhdGVnb3J5JywgJ3ZvZGktZXh0ZW5zaW9ucycpIH1cbiAgICAgICAgICAgICAgICAgICAgc2VsZWN0ZWRUZXJtSWRzPXsgY2F0ZWdvcnkgPyBjYXRlZ29yeS5zcGxpdCgnLCcpLm1hcChOdW1iZXIpIDogW10gfVxuICAgICAgICAgICAgICAgICAgICB1cGRhdGVTZWxlY3RlZFRlcm1JZHM9eyB0aGlzLm9uQ2hhbmdlQ2F0ZWdvcnkgfVxuICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgKSA6ICggY2F0VGF4b25vbXkgJiYgISggaGlkZUZpZWxkcyAmJiBoaWRlRmllbGRzLmluY2x1ZGVzKCdnZW5yZScpICkgPyAoXG4gICAgICAgICAgICAgICAgPFRlcm1TZWxlY3RvclxuICAgICAgICAgICAgICAgICAgICBwb3N0VHlwZSA9IHsgcG9zdFR5cGUgfVxuICAgICAgICAgICAgICAgICAgICB0YXhvbm9teSA9IHsgY2F0VGF4b25vbXkgfVxuICAgICAgICAgICAgICAgICAgICB0aXRsZSA9IHsgX18oJ1NlYXJjaCBHZW5yZScsICd2b2RpLWV4dGVuc2lvbnMnKSB9XG4gICAgICAgICAgICAgICAgICAgIHNlbGVjdGVkVGVybUlkcz17IGdlbnJlID8gZ2VucmUuc3BsaXQoJywnKS5tYXAoTnVtYmVyKSA6IFtdIH1cbiAgICAgICAgICAgICAgICAgICAgdXBkYXRlU2VsZWN0ZWRUZXJtSWRzPXsgdGhpcy5vbkNoYW5nZUdlbnJlIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICkgOiAnJyApIH1cbiAgICAgICAgICAgICAgICB7ICEoIGhpZGVGaWVsZHMgJiYgaGlkZUZpZWxkcy5pbmNsdWRlcygndGFnJykgKSA/IChcbiAgICAgICAgICAgICAgICA8VGVybVNlbGVjdG9yXG4gICAgICAgICAgICAgICAgICAgIHBvc3RUeXBlID0geyBwb3N0VHlwZSB9XG4gICAgICAgICAgICAgICAgICAgIHRheG9ub215ID0geyB0YWdUYXhvbm9teSB9XG4gICAgICAgICAgICAgICAgICAgIHRpdGxlID0geyBfXygnU2VhcmNoIFRhZycsICd2b2RpLWV4dGVuc2lvbnMnKSB9XG4gICAgICAgICAgICAgICAgICAgIHNlbGVjdGVkVGVybUlkcz17IHRhZyA/IHRhZy5zcGxpdCgnLCcpLm1hcChOdW1iZXIpIDogW10gfVxuICAgICAgICAgICAgICAgICAgICB1cGRhdGVTZWxlY3RlZFRlcm1JZHM9eyB0aGlzLm9uQ2hhbmdlVGFnIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICkgOiAnJyB9XG4gICAgICAgICAgICAgICAgeyAhKCBoaWRlRmllbGRzICYmIGhpZGVGaWVsZHMuaW5jbHVkZXMoJ2ZlYXR1cmVkJykgKSA/IChcbiAgICAgICAgICAgICAgICA8Q2hlY2tib3hDb250cm9sXG4gICAgICAgICAgICAgICAgICAgIGxhYmVsPXtfXygnRmVhdHVyZWQnLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIGhlbHA9e19fKCdDaGVjayB0byBzZWxlY3QgZmVhdHVyZWQgcG9zdHMuJywgJ3ZvZGktZXh0ZW5zaW9ucycpfVxuICAgICAgICAgICAgICAgICAgICBjaGVja2VkPXsgZmVhdHVyZWQgfVxuICAgICAgICAgICAgICAgICAgICBvbkNoYW5nZT17IHRoaXMub25DaGFuZ2VGZWF0dXJlZCB9XG4gICAgICAgICAgICAgICAgLz5cbiAgICAgICAgICAgICAgICApIDogJycgfVxuICAgICAgICAgICAgICAgIHsgISggaGlkZUZpZWxkcyAmJiBoaWRlRmllbGRzLmluY2x1ZGVzKCd0b3BfcmF0ZWQnKSApID8gKFxuICAgICAgICAgICAgICAgIDxDaGVja2JveENvbnRyb2xcbiAgICAgICAgICAgICAgICAgICAgbGFiZWw9e19fKCdUb3AgUmF0ZWQnLCAndm9kaS1leHRlbnNpb25zJyl9XG4gICAgICAgICAgICAgICAgICAgIGhlbHA9e19fKCdDaGVjayB0byBzZWxlY3QgdG9wIHJhdGVkIHBvc3RzLicsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgY2hlY2tlZD17IHRvcF9yYXRlZCB9XG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXsgdGhpcy5vbkNoYW5nZVRvcFJhdGVkIH1cbiAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICkgOiAnJyB9XG4gICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgKTtcbiAgICB9XG59IiwiaW1wb3J0IHsgSXRlbUxpc3QgfSBmcm9tIFwiLi9JdGVtTGlzdFwiO1xuaW1wb3J0ICogYXMgYXBpIGZyb20gJy4uL3V0aWxzL2FwaSc7XG5pbXBvcnQgeyB1bmlxdWVCeUlkLCBkZWJvdW5jZSB9IGZyb20gJy4uL3V0aWxzL3VzZWZ1bC1mdW5jcyc7XG5cbmNvbnN0IHsgX18gfSA9IHdwLmkxOG47XG5jb25zdCB7IEljb24gfSA9IHdwLmNvbXBvbmVudHM7XG5jb25zdCB7IENvbXBvbmVudCB9ID0gd3AuZWxlbWVudDtcblxuLyoqXG4gKiBUZXJtU2VsZWN0b3IgQ29tcG9uZW50XG4gKi9cbmV4cG9ydCBjbGFzcyBUZXJtU2VsZWN0b3IgZXh0ZW5kcyBDb21wb25lbnQge1xuICAgIC8qKlxuICAgICAqIENvbnN0cnVjdG9yIGZvciBUZXJtU2VsZWN0b3IgQ29tcG9uZW50LlxuICAgICAqIFNldHMgdXAgc3RhdGUsIGFuZCBjcmVhdGVzIGJpbmRpbmdzIGZvciBmdW5jdGlvbnMuXG4gICAgICogQHBhcmFtIG9iamVjdCBwcm9wcyAtIGN1cnJlbnQgY29tcG9uZW50IHByb3BlcnRpZXMuXG4gICAgICovXG4gICAgY29uc3RydWN0b3IocHJvcHMpIHtcbiAgICAgICAgc3VwZXIoLi4uYXJndW1lbnRzKTtcbiAgICAgICAgdGhpcy5wcm9wcyA9IHByb3BzO1xuXG4gICAgICAgIHRoaXMuc3RhdGUgPSB7XG4gICAgICAgICAgICB0ZXJtczogW10sXG4gICAgICAgICAgICBsb2FkaW5nOiBmYWxzZSxcbiAgICAgICAgICAgIHR5cGU6IHByb3BzLnBvc3RUeXBlIHx8ICdwb3N0JyxcbiAgICAgICAgICAgIHRheG9ub215OiBwcm9wcy50YXhvbm9teSB8fCAnY2F0ZWdvcnknLFxuICAgICAgICAgICAgdGF4b25vbWllczogW10sXG4gICAgICAgICAgICBmaWx0ZXI6ICcnLFxuICAgICAgICAgICAgZmlsdGVyTG9hZGluZzogZmFsc2UsXG4gICAgICAgICAgICBmaWx0ZXJUZXJtczogW10sXG4gICAgICAgICAgICBpbml0aWFsTG9hZGluZzogZmFsc2UsXG4gICAgICAgIH07XG5cbiAgICAgICAgdGhpcy5hZGRUZXJtID0gdGhpcy5hZGRUZXJtLmJpbmQodGhpcyk7XG4gICAgICAgIHRoaXMucmVtb3ZlVGVybSA9IHRoaXMucmVtb3ZlVGVybS5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLmhhbmRsZUlucHV0RmlsdGVyQ2hhbmdlID0gdGhpcy5oYW5kbGVJbnB1dEZpbHRlckNoYW5nZS5iaW5kKHRoaXMpO1xuICAgICAgICB0aGlzLmRvVGVybUZpbHRlciA9IGRlYm91bmNlKHRoaXMuZG9UZXJtRmlsdGVyLmJpbmQodGhpcyksIDMwMCk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogV2hlbiB0aGUgY29tcG9uZW50IG1vdW50cyBpdCBjYWxscyB0aGlzIGZ1bmN0aW9uLlxuICAgICAqIEZldGNoZXMgdGVybXMgdGF4b25vbWllcywgc2VsZWN0ZWQgdGVybXMgdGhlbiBtYWtlcyBmaXJzdCBjYWxsIGZvciB0ZXJtc1xuICAgICAqL1xuICAgIGNvbXBvbmVudERpZE1vdW50KCkge1xuICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgIGluaXRpYWxMb2FkaW5nOiB0cnVlLFxuICAgICAgICB9KTtcblxuICAgICAgICBhcGkuZ2V0VGF4b25vbWllcyggeyB0eXBlOiB0aGlzLnN0YXRlLnR5cGUgfSApXG4gICAgICAgICAgICAudGhlbigoIHJlc3BvbnNlICkgPT4ge1xuICAgICAgICAgICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgICAgICAgICB0YXhvbm9taWVzOiByZXNwb25zZVxuICAgICAgICAgICAgICAgIH0sICgpID0+IHtcbiAgICAgICAgICAgICAgICAgICAgdGhpcy5yZXRyaWV2ZVNlbGVjdGVkVGVybXMoKVxuICAgICAgICAgICAgICAgICAgICAgICAgLnRoZW4oKCkgPT4ge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMuc2V0U3RhdGUoe1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpbml0aWFsTG9hZGluZzogZmFsc2UsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogR2V0VGVybXMgd3JhcHBlciwgYnVpbGRzIHRoZSByZXF1ZXN0IGFyZ3VtZW50IGJhc2VkIHN0YXRlIGFuZCBwYXJhbWV0ZXJzIHBhc3NlZC9cbiAgICAgKiBAcGFyYW0ge29iamVjdH0gYXJncyAtIGRlc2lyZWQgYXJndW1lbnRzIChjYW4gYmUgZW1wdHkpLlxuICAgICAqIEByZXR1cm5zIHtQcm9taXNlPFQ+fVxuICAgICAqL1xuICAgIGdldFRlcm1zKGFyZ3MgPSB7fSkge1xuICAgICAgICBjb25zdCB7IHNlbGVjdGVkVGVybUlkcyB9ID0gdGhpcy5wcm9wcztcblxuICAgICAgICBjb25zdCBkZWZhdWx0QXJncyA9IHtcbiAgICAgICAgICAgIHBlcl9wYWdlOiAxMCxcbiAgICAgICAgICAgIHR5cGU6IHRoaXMuc3RhdGUudHlwZSxcbiAgICAgICAgICAgIHRheG9ub215OiB0aGlzLnN0YXRlLnRheG9ub215LFxuICAgICAgICAgICAgc2VhcmNoOiB0aGlzLnN0YXRlLmZpbHRlcixcbiAgICAgICAgfTtcblxuICAgICAgICBjb25zdCByZXF1ZXN0QXJndW1lbnRzID0ge1xuICAgICAgICAgICAgLi4uZGVmYXVsdEFyZ3MsXG4gICAgICAgICAgICAuLi5hcmdzXG4gICAgICAgIH07XG5cbiAgICAgICAgcmVxdWVzdEFyZ3VtZW50cy5yZXN0QmFzZSA9IHRoaXMuc3RhdGUudGF4b25vbWllc1t0aGlzLnN0YXRlLnRheG9ub215XS5yZXN0X2Jhc2U7XG5cbiAgICAgICAgcmV0dXJuIGFwaS5nZXRUZXJtcyhyZXF1ZXN0QXJndW1lbnRzKVxuICAgICAgICAgICAgLnRoZW4ocmVzcG9uc2UgPT4ge1xuICAgICAgICAgICAgICAgIGlmIChyZXF1ZXN0QXJndW1lbnRzLnNlYXJjaCkge1xuICAgICAgICAgICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGZpbHRlclRlcm1zOiByZXNwb25zZS5maWx0ZXIoKHsgaWQgfSkgPT4gc2VsZWN0ZWRUZXJtSWRzLmluZGV4T2YoaWQpID09PSAtMSksXG4gICAgICAgICAgICAgICAgICAgIH0pO1xuXG4gICAgICAgICAgICAgICAgICAgIHJldHVybiByZXNwb25zZTtcbiAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICAgICAgdGVybXM6IHVuaXF1ZUJ5SWQoWy4uLnRoaXMuc3RhdGUudGVybXMsIC4uLnJlc3BvbnNlXSksXG4gICAgICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgICAgICAvLyByZXR1cm4gcmVzcG9uc2UgdG8gY29udGludWUgdGhlIGNoYWluXG4gICAgICAgICAgICAgICAgcmV0dXJuIHJlc3BvbnNlO1xuICAgICAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogR2V0cyB0aGUgc2VsZWN0ZWQgdGVybXMgYnkgaWQgZnJvbSB0aGUgYHRlcm1zYCBzdGF0ZSBvYmplY3QgYW5kIHNvcnRzIHRoZW0gYnkgdGhlaXIgcG9zaXRpb24gaW4gdGhlIHNlbGVjdGVkIGFycmF5LlxuICAgICAqIEByZXR1cm5zIEFycmF5IG9mIG9iamVjdHMuXG4gICAgICovXG4gICAgZ2V0U2VsZWN0ZWRUZXJtcygpIHtcbiAgICAgICAgY29uc3QgeyBzZWxlY3RlZFRlcm1JZHMgfSA9IHRoaXMucHJvcHM7XG4gICAgICAgIHJldHVybiB0aGlzLnN0YXRlLnRlcm1zXG4gICAgICAgICAgICAuZmlsdGVyKCh7IGlkIH0pID0+IHNlbGVjdGVkVGVybUlkcy5pbmRleE9mKGlkKSAhPT0gLTEpXG4gICAgICAgICAgICAuc29ydCgoYSwgYikgPT4ge1xuICAgICAgICAgICAgICAgIGNvbnN0IGFJbmRleCA9IHRoaXMucHJvcHMuc2VsZWN0ZWRUZXJtSWRzLmluZGV4T2YoYS5pZCk7XG4gICAgICAgICAgICAgICAgY29uc3QgYkluZGV4ID0gdGhpcy5wcm9wcy5zZWxlY3RlZFRlcm1JZHMuaW5kZXhPZihiLmlkKTtcblxuICAgICAgICAgICAgICAgIGlmIChhSW5kZXggPiBiSW5kZXgpIHtcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIDE7XG4gICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgaWYgKGFJbmRleCA8IGJJbmRleCkge1xuICAgICAgICAgICAgICAgICAgICByZXR1cm4gLTE7XG4gICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgcmV0dXJuIDA7XG4gICAgICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBNYWtlcyB0aGUgbmVjZXNzYXJ5IGFwaSBjYWxscyB0byBmZXRjaCB0aGUgc2VsZWN0ZWQgdGVybXMgYW5kIHJldHVybnMgYSBwcm9taXNlLlxuICAgICAqIEByZXR1cm5zIHsqfVxuICAgICAqL1xuICAgIHJldHJpZXZlU2VsZWN0ZWRUZXJtcygpIHtcbiAgICAgICAgY29uc3QgeyB0ZXJtVHlwZSwgc2VsZWN0ZWRUZXJtSWRzIH0gPSB0aGlzLnByb3BzO1xuICAgICAgICBjb25zdCB7IHRheG9ub21pZXMgfSA9IHRoaXMuc3RhdGU7XG5cbiAgICAgICAgaWYgKCBzZWxlY3RlZFRlcm1JZHMgJiYgIXNlbGVjdGVkVGVybUlkcy5sZW5ndGggPiAwICkge1xuICAgICAgICAgICAgLy8gcmV0dXJuIGEgZmFrZSBwcm9taXNlIHRoYXQgYXV0byByZXNvbHZlcy5cbiAgICAgICAgICAgIHJldHVybiBuZXcgUHJvbWlzZSgocmVzb2x2ZSkgPT4gcmVzb2x2ZSgpKTtcbiAgICAgICAgfVxuXG4gICAgICAgIHJldHVybiB0aGlzLmdldFRlcm1zKHtcbiAgICAgICAgICAgIGluY2x1ZGU6IHRoaXMucHJvcHMuc2VsZWN0ZWRUZXJtSWRzLmpvaW4oJywnKSxcbiAgICAgICAgICAgIHBlcl9wYWdlOiAxMDAsXG4gICAgICAgICAgICB0ZXJtVHlwZVxuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBBZGRzIGRlc2lyZWQgdGVybSBpZCB0byB0aGUgc2VsZWN0ZWRUZXJtSWRzIExpc3RcbiAgICAgKiBAcGFyYW0ge0ludGVnZXJ9IHRlcm1faWRcbiAgICAgKi9cbiAgICBhZGRUZXJtKHRlcm1faWQpIHtcbiAgICAgICAgaWYgKHRoaXMuc3RhdGUuZmlsdGVyKSB7XG4gICAgICAgICAgICBjb25zdCB0ZXJtID0gdGhpcy5zdGF0ZS5maWx0ZXJUZXJtcy5maWx0ZXIocCA9PiBwLmlkID09PSB0ZXJtX2lkKTtcbiAgICAgICAgICAgIGNvbnN0IHRlcm1zID0gdW5pcXVlQnlJZChbXG4gICAgICAgICAgICAgICAgLi4udGhpcy5zdGF0ZS50ZXJtcyxcbiAgICAgICAgICAgICAgICAuLi50ZXJtXG4gICAgICAgICAgICBdKTtcblxuICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgdGVybXNcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG5cbiAgICAgICAgdGhpcy5wcm9wcy51cGRhdGVTZWxlY3RlZFRlcm1JZHMoW1xuICAgICAgICAgICAgLi4udGhpcy5wcm9wcy5zZWxlY3RlZFRlcm1JZHMsXG4gICAgICAgICAgICB0ZXJtX2lkXG4gICAgICAgIF0pO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFJlbW92ZXMgZGVzaXJlZCB0ZXJtIGlkIHRvIHRoZSBzZWxlY3RlZFRlcm1JZHMgTGlzdFxuICAgICAqIEBwYXJhbSB7SW50ZWdlcn0gdGVybV9pZFxuICAgICAqL1xuICAgIHJlbW92ZVRlcm0odGVybV9pZCkge1xuICAgICAgICB0aGlzLnByb3BzLnVwZGF0ZVNlbGVjdGVkVGVybUlkcyhbXG4gICAgICAgICAgICAuLi50aGlzLnByb3BzLnNlbGVjdGVkVGVybUlkc1xuICAgICAgICBdLmZpbHRlcihpZCA9PiBpZCAhPT0gdGVybV9pZCkpO1xuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEhhbmRsZXMgdGhlIHNlYXJjaCBib3ggaW5wdXQgdmFsdWVcbiAgICAgKiBAcGFyYW0gc3RyaW5nIHR5cGUgLSBjb21lcyBmcm9tIHRoZSBldmVudCBvYmplY3QgdGFyZ2V0LlxuICAgICAqL1xuICAgIGhhbmRsZUlucHV0RmlsdGVyQ2hhbmdlKHsgdGFyZ2V0OiB7IHZhbHVlOmZpbHRlciA9ICcnIH0gPSB7fSB9ID0ge30pIHtcbiAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICBmaWx0ZXJcbiAgICAgICAgfSwgKCkgPT4ge1xuICAgICAgICAgICAgaWYgKCFmaWx0ZXIpIHtcbiAgICAgICAgICAgICAgICAvLyByZW1vdmUgZmlsdGVyZWQgdGVybXNcbiAgICAgICAgICAgICAgICByZXR1cm4gdGhpcy5zZXRTdGF0ZSh7IGZpbHRlcmVkVGVybXM6IFtdLCBmaWx0ZXJpbmc6IGZhbHNlIH0pO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICB0aGlzLmRvVGVybUZpbHRlcigpO1xuICAgICAgICB9KVxuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEFjdHVhbCBhcGkgY2FsbCBmb3Igc2VhcmNoaW5nIGZvciBxdWVyeSwgdGhpcyBmdW5jdGlvbiBpcyBkZWJvdW5jZWQgaW4gY29uc3RydWN0b3IuXG4gICAgICovXG4gICAgZG9UZXJtRmlsdGVyKCkge1xuICAgICAgICBjb25zdCB7IGZpbHRlciA9ICcnIH0gPSB0aGlzLnN0YXRlO1xuXG4gICAgICAgIGlmICghZmlsdGVyKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgIGZpbHRlcmluZzogdHJ1ZSxcbiAgICAgICAgICAgIGZpbHRlckxvYWRpbmc6IHRydWVcbiAgICAgICAgfSk7XG5cbiAgICAgICAgdGhpcy5nZXRUZXJtcygpXG4gICAgICAgICAgICAudGhlbigoKSA9PiB7XG4gICAgICAgICAgICAgICAgdGhpcy5zZXRTdGF0ZSh7XG4gICAgICAgICAgICAgICAgICAgIGZpbHRlckxvYWRpbmc6IGZhbHNlXG4gICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICB9KTtcbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBSZW5kZXJzIHRoZSBUZXJtU2VsZWN0b3IgY29tcG9uZW50LlxuICAgICAqL1xuICAgIHJlbmRlcigpIHtcbiAgICAgICAgY29uc3QgeyB0aXRsZSA9IF9fKCdTZWFyY2ggVGVybScsICd2b2RpJykgfSA9IHRoaXMucHJvcHM7XG4gICAgICAgIGNvbnN0IGlzRmlsdGVyZWQgPSB0aGlzLnN0YXRlLmZpbHRlcmluZztcbiAgICAgICAgY29uc3QgdGVybUxpc3QgPSBpc0ZpbHRlcmVkICYmICF0aGlzLnN0YXRlLmZpbHRlckxvYWRpbmcgPyB0aGlzLnN0YXRlLmZpbHRlclRlcm1zIDogW107XG4gICAgICAgIGNvbnN0IFNlbGVjdGVkVGVybUxpc3QgID0gdGhpcy5nZXRTZWxlY3RlZFRlcm1zKCk7XG5cbiAgICAgICAgY29uc3QgYWRkSWNvbiA9IDxJY29uIGljb249XCJwbHVzXCIgLz47XG4gICAgICAgIGNvbnN0IHJlbW92ZUljb24gPSA8SWNvbiBpY29uPVwibWludXNcIiAvPjtcblxuICAgICAgICBjb25zdCBzZWFyY2hpbnB1dHVuaXF1ZUlkID0gJ3NlYXJjaGlucHV0LScgKyBNYXRoLnJhbmRvbSgpLnRvU3RyaW5nKDM2KS5zdWJzdHIoMiwgMTYpO1xuXG4gICAgICAgIHJldHVybiAoXG4gICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sIGNvbXBvbmVudHMtdGVybS1zZWxlY3RvclwiPlxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY29tcG9uZW50cy1iYXNlLWNvbnRyb2xfX2ZpZWxkLS1zZWxlY3RlZFwiPlxuICAgICAgICAgICAgICAgICAgICA8aDI+eyB0aXRsZSB9PC9oMj5cbiAgICAgICAgICAgICAgICAgICAgPEl0ZW1MaXN0XG4gICAgICAgICAgICAgICAgICAgICAgICBpdGVtcz17U2VsZWN0ZWRUZXJtTGlzdH1cbiAgICAgICAgICAgICAgICAgICAgICAgIGxvYWRpbmc9e3RoaXMuc3RhdGUuaW5pdGlhbExvYWRpbmd9XG4gICAgICAgICAgICAgICAgICAgICAgICBhY3Rpb249e3RoaXMucmVtb3ZlVGVybX1cbiAgICAgICAgICAgICAgICAgICAgICAgIGljb249e3JlbW92ZUljb259XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjb21wb25lbnRzLWJhc2UtY29udHJvbF9fZmllbGRcIj5cbiAgICAgICAgICAgICAgICAgICAgPGxhYmVsIGh0bWxGb3I9e3NlYXJjaGlucHV0dW5pcXVlSWR9IGNsYXNzTmFtZT1cImNvbXBvbmVudHMtYmFzZS1jb250cm9sX19sYWJlbFwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgPEljb24gaWNvbj1cInNlYXJjaFwiIC8+XG4gICAgICAgICAgICAgICAgICAgIDwvbGFiZWw+XG4gICAgICAgICAgICAgICAgICAgIDxpbnB1dFxuICAgICAgICAgICAgICAgICAgICAgICAgY2xhc3NOYW1lPVwiY29tcG9uZW50cy10ZXh0LWNvbnRyb2xfX2lucHV0XCJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlkPXtzZWFyY2hpbnB1dHVuaXF1ZUlkfVxuICAgICAgICAgICAgICAgICAgICAgICAgdHlwZT1cInNlYXJjaFwiXG4gICAgICAgICAgICAgICAgICAgICAgICBwbGFjZWhvbGRlcj17X18oJ1BsZWFzZSBlbnRlciB5b3VyIHNlYXJjaCBxdWVyeS4uLicsICd2b2RpLWV4dGVuc2lvbnMnKX1cbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlPXt0aGlzLnN0YXRlLmZpbHRlcn1cbiAgICAgICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlPXt0aGlzLmhhbmRsZUlucHV0RmlsdGVyQ2hhbmdlfVxuICAgICAgICAgICAgICAgICAgICAvPlxuICAgICAgICAgICAgICAgICAgICA8SXRlbUxpc3RcbiAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW1zPXt0ZXJtTGlzdH1cbiAgICAgICAgICAgICAgICAgICAgICAgIGxvYWRpbmc9e3RoaXMuc3RhdGUuaW5pdGlhbExvYWRpbmd8fHRoaXMuc3RhdGUubG9hZGluZ3x8dGhpcy5zdGF0ZS5maWx0ZXJMb2FkaW5nfVxuICAgICAgICAgICAgICAgICAgICAgICAgZmlsdGVyZWQ9e2lzRmlsdGVyZWR9XG4gICAgICAgICAgICAgICAgICAgICAgICBhY3Rpb249e3RoaXMuYWRkVGVybX1cbiAgICAgICAgICAgICAgICAgICAgICAgIGljb249e2FkZEljb259XG4gICAgICAgICAgICAgICAgICAgIC8+XG4gICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgKTtcbiAgICB9XG59IiwiY29uc3QgeyBhcGlGZXRjaCB9ID0gd3A7XG5cbi8qKlxuICogTWFrZXMgYSBnZXQgcmVxdWVzdCB0byB0aGUgUG9zdFR5cGVzIGVuZHBvaW50LlxuICpcbiAqIEByZXR1cm5zIHtQcm9taXNlPGFueT59XG4gKi9cbmV4cG9ydCBjb25zdCBnZXRQb3N0VHlwZXMgPSAoKSA9PiB7XG4gICAgcmV0dXJuIGFwaUZldGNoKCB7IHBhdGg6ICcvd3AvdjIvdHlwZXMnIH0gKTtcbn07XG5cbi8qKlxuICogTWFrZXMgYSBnZXQgcmVxdWVzdCB0byB0aGUgZGVzaXJlZCBwb3N0IHR5cGUgYW5kIGJ1aWxkcyB0aGUgcXVlcnkgc3RyaW5nIGJhc2VkIG9uIGFuIG9iamVjdC5cbiAqXG4gKiBAcGFyYW0ge3N0cmluZ3xib29sZWFufSByZXN0QmFzZSAtIHJlc3QgYmFzZSBmb3IgdGhlIHF1ZXJ5LlxuICogQHBhcmFtIHtvYmplY3R9IGFyZ3NcbiAqIEByZXR1cm5zIHtQcm9taXNlPGFueT59XG4gKi9cbmV4cG9ydCBjb25zdCBnZXRQb3N0cyA9ICh7IHJlc3RCYXNlID0gZmFsc2UsIC4uLmFyZ3MgfSkgPT4ge1xuICAgIGNvbnN0IHF1ZXJ5U3RyaW5nID0gT2JqZWN0LmtleXMoYXJncykubWFwKGFyZyA9PiBgJHthcmd9PSR7YXJnc1thcmddfWApLmpvaW4oJyYnKTtcblxuICAgIGxldCBwYXRoID0gYC93cC92Mi8ke3Jlc3RCYXNlfT8ke3F1ZXJ5U3RyaW5nfSZfZW1iZWRgO1xuICAgIHJldHVybiBhcGlGZXRjaCggeyBwYXRoOiBwYXRoIH0gKTtcbn07XG5cbi8qKlxuICogTWFrZXMgYSBnZXQgcmVxdWVzdCB0byB0aGUgUG9zdFR5cGUgVGF4b25vbWllcyBlbmRwb2ludC5cbiAqXG4gKiBAcmV0dXJucyB7UHJvbWlzZTxhbnk+fVxuICovXG5leHBvcnQgY29uc3QgZ2V0VGF4b25vbWllcyA9ICh7IC4uLmFyZ3MgfSkgPT4ge1xuICAgIGNvbnN0IHF1ZXJ5U3RyaW5nID0gT2JqZWN0LmtleXMoYXJncykubWFwKGFyZyA9PiBgJHthcmd9PSR7YXJnc1thcmddfWApLmpvaW4oJyYnKTtcblxuICAgIGxldCBwYXRoID0gYC93cC92Mi90YXhvbm9taWVzPyR7cXVlcnlTdHJpbmd9Jl9lbWJlZGA7XG4gICAgcmV0dXJuIGFwaUZldGNoKCB7IHBhdGg6IHBhdGggfSApO1xufTtcblxuLyoqXG4gKiBNYWtlcyBhIGdldCByZXF1ZXN0IHRvIHRoZSBkZXNpcmVkIHBvc3QgdHlwZSBhbmQgYnVpbGRzIHRoZSBxdWVyeSBzdHJpbmcgYmFzZWQgb24gYW4gb2JqZWN0LlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfGJvb2xlYW59IHJlc3RCYXNlIC0gcmVzdCBiYXNlIGZvciB0aGUgcXVlcnkuXG4gKiBAcGFyYW0ge29iamVjdH0gYXJnc1xuICogQHJldHVybnMge1Byb21pc2U8YW55Pn1cbiAqL1xuZXhwb3J0IGNvbnN0IGdldFRlcm1zID0gKHsgcmVzdEJhc2UgPSBmYWxzZSwgLi4uYXJncyB9KSA9PiB7XG4gICAgY29uc3QgcXVlcnlTdHJpbmcgPSBPYmplY3Qua2V5cyhhcmdzKS5tYXAoYXJnID0+IGAke2FyZ309JHthcmdzW2FyZ119YCkuam9pbignJicpO1xuXG4gICAgbGV0IHBhdGggPSBgL3dwL3YyLyR7cmVzdEJhc2V9PyR7cXVlcnlTdHJpbmd9Jl9lbWJlZGA7XG4gICAgcmV0dXJuIGFwaUZldGNoKCB7IHBhdGg6IHBhdGggfSApO1xufTsiLCIvKipcbiAqIFJldHVybnMgYSB1bmlxdWUgYXJyYXkgb2Ygb2JqZWN0cyBiYXNlZCBvbiBhIGRlc2lyZWQga2V5LlxuICogQHBhcmFtIHthcnJheX0gYXJyIC0gYXJyYXkgb2Ygb2JqZWN0cy5cbiAqIEBwYXJhbSB7c3RyaW5nfGludH0ga2V5IC0ga2V5IHRvIGZpbHRlciBvYmplY3RzIGJ5XG4gKi9cbmV4cG9ydCBjb25zdCB1bmlxdWVCeSA9IChhcnIsIGtleSkgPT4ge1xuICAgIGxldCBrZXlzID0gW107XG4gICAgcmV0dXJuIGFyci5maWx0ZXIoaXRlbSA9PiB7XG4gICAgICAgIGlmIChrZXlzLmluZGV4T2YoaXRlbVtrZXldKSAhPT0gLTEpIHtcbiAgICAgICAgICAgIHJldHVybiBmYWxzZTtcbiAgICAgICAgfVxuXG4gICAgICAgIHJldHVybiBrZXlzLnB1c2goaXRlbVtrZXldKTtcbiAgICB9KTtcbn07XG5cbi8qKlxuICogUmV0dXJucyBhIHVuaXF1ZSBhcnJheSBvZiBvYmplY3RzIGJhc2VkIG9uIHRoZSBpZCBwcm9wZXJ0eS5cbiAqIEBwYXJhbSB7YXJyYXl9IGFyciAtIGFycmF5IG9mIG9iamVjdHMgdG8gZmlsdGVyLlxuICogQHJldHVybnMgeyp9XG4gKi9cbmV4cG9ydCBjb25zdCB1bmlxdWVCeUlkID0gYXJyID0+IHVuaXF1ZUJ5KGFyciwgJ2lkJyk7XG5cbi8qKlxuICogRGVib3VuY2UgYSBmdW5jdGlvbiBieSBsaW1pdGluZyBob3cgb2Z0ZW4gaXQgY2FuIHJ1bi5cbiAqIEBwYXJhbSB7ZnVuY3Rpb259IGZ1bmMgLSBjYWxsYmFjayBmdW5jdGlvblxuICogQHBhcmFtIHtJbnRlZ2VyfSB3YWl0IC0gVGltZSBpbiBtaWxsaXNlY29uZHMgaG93IGxvbmcgaXQgc2hvdWxkIHdhaXQuXG4gKiBAcmV0dXJucyB7RnVuY3Rpb259XG4gKi9cbmV4cG9ydCBjb25zdCBkZWJvdW5jZSA9IChmdW5jLCB3YWl0KSA9PiB7XG4gICAgbGV0IHRpbWVvdXQgPSBudWxsO1xuXG4gICAgcmV0dXJuIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgY29uc3QgY29udGV4dCA9IHRoaXM7XG4gICAgICAgIGNvbnN0IGFyZ3MgPSBhcmd1bWVudHM7XG5cbiAgICAgICAgY29uc3QgbGF0ZXIgPSAoKSA9PiB7XG4gICAgICAgICAgICBmdW5jLmFwcGx5KGNvbnRleHQsIGFyZ3MpO1xuICAgICAgICB9O1xuXG4gICAgICAgIGNsZWFyVGltZW91dCh0aW1lb3V0KTtcbiAgICAgICAgdGltZW91dCA9IHNldFRpbWVvdXQobGF0ZXIsIHdhaXQpO1xuICAgIH1cbn07Il19
