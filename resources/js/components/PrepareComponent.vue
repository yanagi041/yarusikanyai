<template>
  <div class="p-tasks-prepare">
    <h2>タスク確認</h2>

    <div class="p-task-prepare__tasks">
      <h3>達成すること：{{ task.title }}</h3>

      <!-- リスト -->
      <div class="c-task-list">
        <p>ドラッグ＆ドロップで順番を変更できます。</p>
        <draggable v-model="tasks">
          <transition-group name="prepare">
            <span class="c-task-list__item" v-for="item in tasks" v-bind:key="item">
              {{ item }}
              <i class="fas fa-bars"></i>
            </span>
          </transition-group>
        </draggable>
        <!-- リスト end -->

        <div class="c-form">
          <div class="c-form__group">
            <div class="c-single-button-group">
              <button type="submit" v-on:click="startProcess" class="btn-light">開始</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import draggable from "vuedraggable";

export default {
  name: "PrepareComponent",
  components: {
    draggable
  },
  data: function() {
    return {
      tasks: []
    };
  },
  props: {
    task: Object
  },
  created: function() {
    for (let i = 0; i <= 4; i++) {
      let order = "task" + i;
      if (this.task[order]) {
        this.tasks.splice(i, 0, this.task[order]);
      } else {
        continue;
      }
    }
  },
  computed: {},
  methods: {
    //リスト実行開始
    startProcess: function() {
      //idとタスク順を変数につめる
      const data = this.tasks;
      const id = this.task.id;

      //axios内でthisを使える様にする
      let self = this;
      //axiosでDB程度保存
      axios
        //POST送信してDBの値を更新
        .post("/tasks/" + id + "/start", data)
        .then(function(response) {
          self.historyId = response.data;
          //実行ページへ遷移
          window.location.href = "/tasks/" + id + "/doing";
        })
        .catch(function(error) {
          if (error.response.status === 401 || error.response.status === 500) {
            //認証エラーかシステムエラーの時
            self.$toasted.global.my_error(
              "エラー(" +
                error.response.status +
                "): " +
                error.response.data.message
            );
          } else {
            console.log(error.response);
            self.$toasted.global.my_error("エラーが発生しました");
          }
        });
    }
  }
};
</script>
