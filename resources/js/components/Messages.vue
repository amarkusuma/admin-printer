<template>
  <table class="table stylish-table">
    <thead>
      <tr>
        <th class="th" colspan="2">Percakapan Antar Pengguna</th>
      </tr>
    </thead>
    <tbody>
      <div class="scroll">
        <tr v-for="(message, index) in messages" :key="message + '-' + index">
          <td style="width:50px;">
            <span class="round">S</span>
          </td>
          <td style="width:580px">
            <h6 class="name-user">{{ message.user.name }}</h6>
            <div>
              <small class="text-muted" id="message">
                <a href="#">{{ message.message }}</a>
              </small>
            </div>
          </td>
        </tr>
      </div>
    </tbody>
  </table>
</template>

<script>
export default {
  //INGAT TAG :message="" DI CODE SEBELUMNYA? CODE TERSEBUT DISEBUT SEBAGIA PROPS
  //GUNANYA UNTUK MENGIRIMKAN DATA KE COMPONENT YANG DITUJU
  //DALAM HAL INI KITA MENGIRIMKAN DATA DENGAN PROPS MESSAGE KE COMPONENT MESSAGES.VUE
  props: ["messages"]
};
</script>

<style>
.name-user {
  padding-bottom: 10px;
}
.scroll {
  max-height: 350px;
  overflow-y: auto;
}
thead .th {
  padding-bottom: 2em;
}
.round {
}
</style>
