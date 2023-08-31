<template>
  <div id="app">
    <h2></h2>
    <div class="np-captcha-container">
      <div class="np-captcha" v-if="captcha && captcha.length">
        <div
          v-for="(c, i) in captcha"
          :key="i"
          :style="{
            fontSize: getFontSize() + 'px',
            fontWeight: 800,
            transform: 'rotate(' + getRotationAngle() + 'deg)',
          }"
          class="np-captcha-character"
        >
          {{ c }}
        </div>
      </div>
    </div>

    <button @click="createCaptcha" class="np-button">Generate new</button>
  </div>
</template>

<script>
export default {
  name: "MyCaptcha",
  ref: 'captchaComponent',
  props: {
    value: String,
  },
  data() {
    return {
      captchaLength: 5,
      captcha: [],
    };
  },
  mounted() {
    this.createCaptcha();
  },
  methods: {
    createCaptcha() {
      let tempCaptcha = "";
      for (let i = 0; i < this.captchaLength; i++) {
        tempCaptcha += this.getRandomCharacter();
      }
      this.captcha = tempCaptcha.split("");
      this.$emit('createCaptcha', this.captcha);
    },
    getRandomCharacter() {
      const symbols = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      const randomNumber = Math.floor(Math.random() * 36);
      return symbols[randomNumber];
    },
    getFontSize() {
      const fontVariations = [14, 20, 30, 36, 40];
      return fontVariations[Math.floor(Math.random() * 5)];
    },
    getRotationAngle() {
      const rotationVariations = [5, 10, 20, 25, -5, -10, -20, -25];
      return rotationVariations[Math.floor(Math.random() * 8)];
    },
  },
};
</script>

<style>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #000000;
  margin-top: 60px;
}
.np-captcha-container {
  background: #eee;
  width: 300px;
  margin: 0 auto;
  margin-bottom: 20px;
}
.np-captcha {
  font-size: 24px;
}
.np-button {
  padding: 6px 10px;
  background: #fff;
  border: 1px solid #eee;
  border-radius: 6px;
  font-size: 16px;
}
.np-captcha-character {
  display: inline-block;
  letter-spacing: 14px;
}
</style>