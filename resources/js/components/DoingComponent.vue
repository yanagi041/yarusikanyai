<template>
  <div class="p-tasks-doing">
    <h2>タスク確認</h2>

    <div>
      <!-- <h3>達成すること：{{ task.title }}</h3> -->
      <!-- リスト -->
      <div>
        <div class="p-tasks-doing__doing-task">
          <transition name="task" mode="out-in">
            <div v-bind:key="currentTaskId">{{tasks[currentTaskId - 1]}}</div>
          </transition>
          <p>が終わるまで、他のことはしない！</p>
        </div>

        <!-- リスト end -->

        <!-- 次に進むボタン -->
        <div class="c-form">
          <div class="c-form__group">
            <div class="c-single-button-group">
              <button type="button" v-on:click="goNext" class="btn-light">次！</button>
            </div>
          </div>
        </div>
        <!-- 次に進むボタン end -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "DoingComponent",
  data: function() {
    return {
      tasks: [],
      currentTaskId: 1
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
    //次に進むボタン
    goNext: function() {
      if (this.tasks[this.currentTaskId]) {
        //++されたIdが空じゃないなら、++して中身表示
        this.currentTaskId++;
      } else {
        //++されたIdが空なら、完了工程へ
        //idを変数に詰める
        const id = this.task.id;
        self.id = id;

        //axiosでリスト処理完了
        axios

          .post("/tasks/" + id + "/finishFlg")
          .then(function(response) {
            console.log(response);
            window.location.href = "/tasks/" + self.id + "/complete";
          })
          .catch(function(error) {
            console.log(error);
          });
      }
    }
  }
};
</script>
