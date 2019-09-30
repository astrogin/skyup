<template>
  <div>
    <el-form label-position="left" label-width="100px" :model="data">
      <el-form-item label="Name">
        <el-input v-model="data.name" />
      </el-form-item>
      <el-form-item label="Activity zone">
        <el-slider
          v-model="data.price"
          range
          :mark="marks"
          :max="marks.max" />
      </el-form-item>
      <el-form-item label="Bedrooms">
        <el-switch v-model="tempData.bedrooms.isSearchable" @click="tempData.bedrooms.isSearchable = !tempData.bedrooms.isSearchable" />
        <el-input-number v-if="tempData.bedrooms.isSearchable" v-model="tempData.bedrooms.value" :min="0" :max="10" />
      </el-form-item>
      <el-form-item label="Bathrooms">
        <el-switch v-model="tempData.bathrooms.isSearchable" @click="tempData.bathrooms.isSearchable = !tempData.bathrooms.isSearchable" />
        <el-input-number v-if="tempData.bathrooms.isSearchable" v-model="tempData.bathrooms.value" :min="0" :max="10" />
      </el-form-item>
      <el-form-item label="Storeys">
        <el-switch v-model="tempData.storeys.isSearchable" @click="tempData.storeys.isSearchable = !tempData.storeys.isSearchable" />
        <el-input-number v-if="tempData.storeys.isSearchable" v-model="tempData.storeys.value" :min="0" :max="10" />
      </el-form-item>
      <el-form-item label="Garages">
        <el-switch v-model="tempData.garages.isSearchable" @click="tempData.garages.isSearchable = !tempData.garages.isSearchable" />
        <el-input-number v-if="tempData.garages.isSearchable" v-model="tempData.garages.value" :min="0" :max="10" />
      </el-form-item>
      <el-button type="primary" @click="onSubmit" v-loading.fullscreen.lock="fullscreenLoading">Query</el-button>
    </el-form>
    <el-table
      :data="tableData"
      style="width: 100%">
      <el-table-column
        prop="id"
        label="Id"
        width="180" />
      <el-table-column
        prop="name"
        label="Name"
        width="180" />
      <el-table-column
        prop="price"
        label="Price"
        width="180" />
    </el-table>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        data: {
          name: '',
          price: [0, 999999]
        },
        tempData: {
          bedrooms: {
            isSearchable: false,
            value: 0,
          },
          bathrooms: {
            isSearchable: false,
            value: 0,
          },
          storeys: {
            isSearchable: false,
            value: 0,
          },
          garages: {
            isSearchable: false,
            value: 0,
          },
        },
        marks: {
          min: 0,
          max: 999999
        },
        fullscreenLoading: false,
        tableData: []
      }
    },
    methods: {
      onSubmit() {
        let self = this;
        this.fullscreenLoading = true;

        _.map(self.tempData, (key, val) => key.isSearchable ? self.data[val] = key.value : '');

        axios.get('/api/search', {

          params: self.data

        }).then((response) => {

          self.fullscreenLoading = false;

          self.tableData = response.data.data;

        });
      }
    }
  }
</script>