<template>
  <div class="comment-form">
    <input v-model="name" class="comment-input" placeholder="Name" />
    <input v-model="text" class="comment-input" placeholder="Text comment" />

    <MyCaptcha v-model="captcha" ref="myCaptchaRef" />

    <input
      v-model="enteredCaptcha"
      class="comment-input"
      placeholder="Enter Captcha"
    />

    <button class="comment-button" @click="addComment">Add comment</button>
  </div>
</template>

<script>
import axios from "axios";
import Qs from "qs";
import MyCaptcha from "@/components/MyCaptcha";
import { useToast } from "vue-toastification";

export default {
  setup() {
    const toast = useToast();
    return { toast };
  },
  components: {
    MyCaptcha,
  },
  data() {
    return {
      name: "",
      text: "",
      enteredCaptcha: "",
      captcha: "",
    };
  },
  methods: {
    addComment() {
      if (this.enteredCaptcha !== this.$refs.myCaptchaRef.captcha.join("")) {
        this.toast.info("Captcha mismatched");
        this.$refs.myCaptchaRef.createCaptcha();
        this.enteredCaptcha = "";
        return;
      }

      const newComment = {
        name: this.name,
        text: this.text,
      };

      const queryString = Qs.stringify(newComment);

      axios
        .post(`/comments_app/api/add?${queryString}`)
        .then((response) => {
          console.log("Response:", response.data);
          this.$emit("comment-added", response.data);
          this.name = "";
          this.text = "";
          this.enteredCaptcha = "";
          this.$refs.myCaptchaRef.createCaptcha();
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
};
</script>

<style scoped>
.comment-form {
  margin-bottom: 20px;
  padding: 20px;
  background-color: #f9f9f9;
  border: 1px solid #ddd;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.comment-input {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.comment-button {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 10px 15px;
  border-radius: 5px;
  cursor: pointer;
}
</style>
