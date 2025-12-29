<template>
  <form @submit.prevent="formSubmit">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="service-step-form" aria-labelledby="form-offcanvasLabel">
      <div class="offcanvas-header border-bottom" v-if="service">
        <h6 class="m-0 h5">
          Service: <span>{{ service.name }}</span>
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="d-flex flex-column border-bottom p-3">
        <div class="">
          <label class="form-label btn btn-info d-block my-0" for="service_step" @click="cloneInput">Add Steps </label>
        </div>
      </div>
      <div class="offcanvas-body">
        <div class="" style="border-bottom: 2px solid gray; margin-top: 8px; padding-bottom: 10px; margin-bottom: 20px;" v-for="(input, index) in stepContainer" :key="index">
          <label class="form-label" for="step">{{ $t("Step") }} {{ index + 1 }} :</label>
          <InputField class="col-md-12" type="text" v-model="input.step" @input="emitInput(index)"></InputField>
          <button type="button" class="ml-2 btn btn-soft-danger btn-sm rounded text-nowrap remove-btn" @click="removeInput(index)"> <i class="fa-solid fa-trash"></i> </button>
          
          <label>Image</label>
          <input type="file" class="form-control" @change="handleImageUpload($event, index)" accept=".jpeg, .jpg, .png, .gif" />
          <img :src="input.full_url" v-if="input.full_url" class="selected-image mb-3 mt-2" />
          
          <label>Description</label>
          <textarea class="form-control" v-model="input.description" @input="emitInput(index)"></textarea>
        </div>
      </div>
      <div class="offcanvas-footer"> 
        <p class="text-center mb-0"><small>{{ $t('Step for Service') }}</small></p>
        <div class="d-grid gap-3 p-3">
          <button class="btn btn-primary d-block"><i class="fa-solid fa-floppy-disk me-2"></i>Update</button>
          <button class="btn btn-outline-primary d-block" type="button" data-bs-dismiss="offcanvas"><i class="fa-solid fa-angles-left"></i>Close</button>
        </div>
      </div>
    </div>
  </form>
</template>

<script setup>
import { ref } from 'vue'
import { GET_STEP_URL, POST_STEP_URL } from '../constant/service'
import { useRequest, useModuleId } from '@/helpers/hooks/useCrudOpration'
import { createRequestWithFormData } from '@/helpers/utilities'
import InputField from '@/vue/components/form-elements/InputField.vue'

const { getRequest } = useRequest()

const service = ref(null)
const serviceId = useModuleId(() => {
  getRequest({ url: GET_STEP_URL, id: serviceId.value }).then((res) => {
    if (res.status) {
      service.value = res.service
      stepContainer.value = res.data || [];
    }
  })
}, 'service_step')

let stepContainer = ref([]);

const emitInput = (index) => {
  emit('input', stepContainer.value);
}

const cloneInput = () => {
  stepContainer.value.push({ step: '', full_url: null , file:null , id:null , description:''});
  emitInput();
}

const removeInput = (index) => {
  stepContainer.value.splice(index, 1);
  emitInput();
}
     
const handleImageUpload = (event, index) => {
  const file = event.target.files[0];
  if (!file) return;

  const reader = new FileReader();
  reader.onload = () => {
    stepContainer.value[index].full_url = reader.result;
    stepContainer.value[index].file = file;
  };
  reader.readAsDataURL(file);
}

const formSubmit = () => {
  let formData = new FormData();
  Object.keys(stepContainer.value).map((index) => {
    Object.keys(stepContainer.value[index]).map((fieldName) => {
      let value = stepContainer.value[index][fieldName]
      if(fieldName == 'full_url') value = ''
      formData.append(`steps[${index}][${fieldName}]`, value);
    })
  });
  createRequestWithFormData(POST_STEP_URL(serviceId.value), { 'Accept': 'application/json' }, formData).then((res) => reset_close_offcanvas(res));
}

const reset_close_offcanvas = (res) => {
  if (res.status) {
    window.successSnackbar(res.message)
    bootstrap.Offcanvas.getInstance('#service-step-form').hide()
  } else {
    window.errorSnackbar(res.message)
    errorMessages.value = res.all_message
  }
}
</script>

<style scoped>
.gallery-images {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(104px, 1fr));
  grid-gap: 1rem;
  align-items: stretch;
}

.image-container {
  position: relative;
  max-width: 100%;
}

.delete-button {
  position: absolute;
  top: -8px;
  right: -8px;
  z-index: 1;
  color: var(--bs-white);
  background-color: var(--bs-danger);
  border: none;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  font-size: 14px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.selected-image {
  object-fit: cover;
  height: 100px;
  width: 100%;
}

.remove-btn {
    position: relative;
    top: -47px;
    left: 350px;
}
</style>
