const path = require("path");
const webpack = require("webpack");
require("dotenv").config();

module.exports = {
  entry: {
    main: "./js/main.js",
    StickyHeader: "./js/StickyHeader.js",
    ThemeToggle: "./js/ThemeToggle.js",
    Loader: "./js/Loader.js",
  },
  mode: "development",
  output: {
    path: path.resolve(__dirname, "dist"),
    filename: "[name].bundle.js",
    publicPath: "auto",
  },
  devtool: "source-map",
  performance: {
    assetFilter: function (assetFilename) {
      return assetFilename.endsWith(".js");
    },
  },
  plugins: [
    new webpack.EvalSourceMapDevToolPlugin({}),
    new webpack.DefinePlugin({
      "process.env": JSON.stringify(process.env),
    }),
  ],
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: "babel-loader",
      },
      {
        test: /\.(css|scss|sass)$/,
        exclude: /\.module.(s(a|c)ss)$/,
        use: ["style-loader", "css-loader", "sass-loader"],
      },
      {
        test: /\.(jpe?g|png|gif|woff|woff2|eot|ttf|svg)$/i,
        type: "asset",
      },
    ],
  },
};
