<template>
  <form @submit.prevent="formSubmit" id="video_form">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="form-offcanvas" aria-labelledby="form-offcanvasLabel">
      <FormHeader :currentId="currentId" :editTitle="editTitle" :createTitle="createTitle"></FormHeader>
      <div class="offcanvas-body">

        <div class="form-group col-md-12">
          <!-- Question Title -->
          <label class="form-label" for="question">{{ $t('Question') }}</label>
          <input type="text" class="form-control" v-model="question" name="question" id="question_value">
        </div>

        <div v-for="(option, index) in options" :key="index" class="form-group col-md-12">
          <label class="form-label" :for="'option' + (index + 1)">{{ $t('Option') }} {{ index + 1 }}</label>
          <input
            type="text"
            class="form-control"
            v-model="options[index]"
            :name="'options[]'"
            :id="'option' + (index + 1) + '_value'"
          >
        </div>

        <!-- Correct Answer -->
        <div class="form-group col-md-12">
          <label class="form-label" for="correct_answer">{{ $t('Correct Answer') }}</label>
          <select class="form-control" v-model="correct_answer"  name="correct_answer" id="correct_answer_value">
            <option value="0">{{ $t('Option 1') }}</option>
            <option value="1">{{ $t('Option 2') }}</option>
            <option value="2">{{ $t('Option 3') }}</option>
            <option value="3">{{ $t('Option 4') }}</option>
          </select>
        </div>

        <div class="form-group">
          <div class="d-flex justify-content-between align-items-center">
            <label class="form-label" for="slider-status">{{ $t('slider.lbl_status') }}</label>
            <div class="form-check form-switch">
              <input class="form-check-input" value="1" :checked="status" name="status" id="slider-status" type="checkbox" v-model="status" />
            </div>
          </div>
        </div>

      </div>
      <FormFooter></FormFooter>
    </div>
  </form>
</template>

<script setup>
import { ref } from 'vue';
import { STORE_URL, EDIT_URL, UPDATE_URL } from '../constant/video';
import { useField, useForm } from 'vee-validate';
import { useModuleId, useRequest, useOnOffcanvasHide } from '@/helpers/hooks/useCrudOpration';
import * as yup from 'yup';

import FormHeader from '@/vue/components/form-elements/FormHeader.vue';
import FormFooter from '@/vue/components/form-elements/FormFooter.vue';

defineProps({
  createTitle: { type: String, default: '' },
  editTitle: { type: String, default: '' },
  customField: { type: Array, default: () => [] },
});

const { getRequest, storeRequest, updateRequest } = useRequest();
const errorMessages = ref({});

// Reset form data when offcanvas is hidden
useOnOffcanvasHide('form-offcanvas', () => setFormData(defaultData()));

const currentId = useModuleId(() => {
  getRequest({ url: EDIT_URL, id: currentId.value }).then((res) => {
    if (res.status) {
      console.log(res.data);
      setFormData(res.data);
    }
  });
  setFormData(defaultData());
});

const defaultData = () => {
  errorMessages.value = {};
  return { status: 1, question: '', options: ['', '', '', ''], correct_answer: '' };
};

const setFormData = (data) => {
  resetForm({ 
    values: { 
      status: data.status, 
      question: data.question, 
      options: data.options, 
      correct_answer: data.correct_answer 
    } 
  });
};

const validationSchema = yup.object({
  // video: yup.mixed().test('fileType', 'Invalid file format', (value) => {
  //   if (!value) return true;
  //   return ['video/mp4', 'video/mov', 'video/avi'].includes(value.type);
  // }).required('Video is a required field'),
});

const { handleSubmit, resetForm } = useForm({ validationSchema });
const { value: status } = useField('status');
const { value: question } = useField('question');
const { value: options } = useField('options');
const { value: correct_answer } = useField('correct_answer');

const formSubmit = handleSubmit((values) => {
  const request = currentId.value > 0 ? updateRequest : storeRequest;
  request({ url: currentId.value > 0 ? UPDATE_URL : STORE_URL, id: currentId.value, body: values, type: 'file' })
    .then((res) => reset_datatable_close_offcanvas(res)); 
}); 

const reset_datatable_close_offcanvas = (res) => {
  if (res.status) {
    window.successSnackbar(res.message);
    renderedDataTable.ajax.reload(null, false);
    bootstrap.Offcanvas.getInstance('#form-offcanvas').hide();
    setFormData(defaultData());
  } else {
    window.errorSnackbar(res.message);
    errorMessages.value = res.all_message;
  }
};
</script>
