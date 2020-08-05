<script>

export default {
  onLaunch: function () {
    var logs = wx.getStorageSync('logs') || [];
    logs.unshift(Date.now());
    wx.setStorageSync('logs', logs);
  },
  globalData: {},
  methods: {}
};
</script>
<style>
@import "./app.css";
</style>