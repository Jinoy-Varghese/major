<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html amp lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/image/marthoma.png'); ?>" />
    <script async src="https://cdn.ampproject.org/v0.js"></script>

    <script type="application/ld+json">
    {

        "image": [
            "logo.jpg"
        ]
    }
    </script>
    <style amp-custom>
    #lap_mtcst {
        display: block;
    }

    #mobile_mtcst {
        display: none;
    }

    @media all and (max-width:499px) {
        #mobile_mtcst {
            display: block;
        }

        #lap_mtcst {
            display: none;
        }

    }
    </style>
    <title>MTCST</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-5.11.2/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-4.3.1/css/bootstrap.min.css'); ?>">
</head>

<body>



















    <!-- We will put our React component inside this div. -->
    <div id="header"></div>
    <!-- Load React. -->
    <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
    <script src="<?php echo base_url('assets/bootstrap-4.3.1/js/bootstrap.min.js'); ?>"></script>
    <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>


    <!-- Load our React component. -->
    <script>
        'use strict';

function _instanceof(left, right) { if (right != null && typeof Symbol !== "undefined" && right[Symbol.hasInstance]) { return !!right[Symbol.hasInstance](left); } else { return left instanceof right; } }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!_instanceof(instance, Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

var Welcome = /*#__PURE__*/function (_React$Component) {
  _inherits(Welcome, _React$Component);

  var _super = _createSuper(Welcome);

  function Welcome(props) {
    var _this;

    _classCallCheck(this, Welcome);

    _this = _super.call(this, props);
    _this.state = {};
    return _this;
  }

  _createClass(Welcome, [{
    key: "render",
    value: function render() {
      return /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("nav", {
        className: "navbar navbar-expand-lg navbar-light bg-light"
      }, /*#__PURE__*/React.createElement("a", {
        className: "navbar-brand",
        href: "#"
      }, "Logo"), /*#__PURE__*/React.createElement("button", {
        className: "navbar-toggler",
        type: "button",
        "data-toggle": "collapse",
        "data-target": "#navbarSupportedContent",
        "aria-controls": "navbarSupportedContent",
        "aria-expanded": "false",
        "aria-label": "Toggle navigation"
      }, /*#__PURE__*/React.createElement("span", {
        className: "navbar-toggler-icon"
      })), /*#__PURE__*/React.createElement("div", {
        className: "collapse navbar-collapse justify-content-end",
        id: "navbarSupportedContent"
      }, /*#__PURE__*/React.createElement("ul", {
        className: "navbar-nav  "
      }, /*#__PURE__*/React.createElement("li", {
        className: "nav-item active"
      }, /*#__PURE__*/React.createElement("a", {
        className: "nav-link",
        href: "#"
      }, "Home ", /*#__PURE__*/React.createElement("span", {
        className: "sr-only"
      }, "(current)"))), /*#__PURE__*/React.createElement("li", {
        className: "nav-item"
      }, /*#__PURE__*/React.createElement("a", {
        className: "nav-link",
        href: "<?php echo base_url('Home/login'); ?>"
      }, "Login")), /*#__PURE__*/React.createElement("li", {
        className: "nav-item dropdown"
      }, /*#__PURE__*/React.createElement("a", {
        className: "nav-link dropdown-toggle",
        href: "#",
        id: "navbarDropdown",
        role: "button",
        "data-toggle": "dropdown",
        "aria-haspopup": "true",
        "aria-expanded": "false"
      }, "Dropdown"), /*#__PURE__*/React.createElement("div", {
        className: "dropdown-menu",
        "aria-labelledby": "navbarDropdown"
      }, /*#__PURE__*/React.createElement("a", {
        className: "dropdown-item",
        href: "#"
      }, "Action"), /*#__PURE__*/React.createElement("a", {
        className: "dropdown-item",
        href: "#"
      }, "Another action"), /*#__PURE__*/React.createElement("div", {
        className: "dropdown-divider"
      }), /*#__PURE__*/React.createElement("a", {
        className: "dropdown-item",
        href: "#"
      }, "Something else here"))), /*#__PURE__*/React.createElement("li", {
        className: "nav-item"
      }, /*#__PURE__*/React.createElement("a", {
        className: "nav-link disabled",
        href: "#"
      }, "Disabled"))), /*#__PURE__*/React.createElement("form", {
        className: "form-inline my-2 my-lg-0"
      }, /*#__PURE__*/React.createElement("input", {
        className: "form-control mr-sm-2",
        type: "search",
        placeholder: "Search",
        "aria-label": "Search"
      }), /*#__PURE__*/React.createElement("button", {
        className: "btn btn-outline-primary my-2 my-sm-0",
        type: "submit"
      }, "Search")))), /*#__PURE__*/React.createElement("div", {
        className: "col-12 p-0 m-0"
      }, /*#__PURE__*/React.createElement("amp-img", {
        height: "85",
        width: "200",
        className: "col-12 p-0 m-0",
        id: "lap_mtcst",
        src: "<?php echo base_url('assets/image/mtcst_cloud.jpeg') ?>",
        alt: "marthoma college of science and technology ayur",
        layout: "responsive"
      }), /*#__PURE__*/React.createElement("amp-img", {
        height: "155",
        width: "100",
        className: "col-12 p-0 m-0",
        id: "mobile_mtcst",
        src: "<?php echo base_url('assets/image/mtcst_cloud_mobile.jpeg') ?>",
        alt: "marthoma college of science and technology ayur",
        layout: "responsive"
      })));
    }
  }]);

  return Welcome;
}(React.Component);

ReactDOM.render( /*#__PURE__*/React.createElement(Welcome, null), document.querySelector('#header'));
    </script>
</body>

</html>