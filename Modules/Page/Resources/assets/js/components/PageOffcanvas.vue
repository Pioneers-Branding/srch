<template>
  <form @submit="formSubmit">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="form-offcanvas" aria-labelledby="form-offcanvasLabel">
      <FormHeader :currentId="currentId" :editTitle="editTitle" :createTitle="createTitle"></FormHeader>
      <div class="offcanvas-body">
        <div class="row">
          <div class="col-12">

            <InputField class="col-md-12" :is-required="true"  type="text"  :label="$t('page.lbl_title')"  placeholder="" v-model="name" :error-message="errors.name" :error-messages="errorMessages['name']"></InputField>
            <div class="form-group">
              <div class="">
                <label class="form-label" for="description">{{ $t('page.lbl_description') }}</label>
                  <textarea  class="form-control" v-model="description" id="description"></textarea>
              <span v-if="errorMessages['description']">
                <ul class="text-danger">
                  <li v-for="err in errorMessages['description']" :key="err">{{ err }}</li>
                </ul>
              </span>
              <span class="text-danger">{{ errors.description }}</span>
               
              </div>
            </div>

             <div class="form-group">
              <label class="form-label" for="sequence">{{ $t('page.lbl_squence') }}</label>
              <input type="number" class="form-control" v-model="sequence" id="sequence" />
              <span v-if="errorMessages['sequence']">
                <ul class="text-danger">
                  <li v-for="err in errorMessages['sequence']" :key="err">{{ err }}</li>
                </ul>
              </span>
              <span class="text-danger">{{ errors.sequence }}</span>
            </div> 
           

            
            

            <div class="form-group col-md-12">

              <div class="text-center">
                    <img :src="ImageViewer || defaultImage" alt="feature-image" class="img-fluid mb-2 avatar-140 avatar-rounded" />
              </div>
              <label class="form-label" for="feature_image">Gallery Image</label>
              <input type="file" class="form-control" id="feature_image" ref="refInput"  @change="fileUpload" accept=".jpeg, .jpg, .png, .gif" />
              <span v-if="errorMessages['feature_image']">
                <ul class="text-danger">
                  <li v-for="err in errorMessages['feature_image']" :key="err">{{ err }}</li>
                </ul>
              </span>
              <span class="text-danger">{{ errors.feature_image }}</span>
              </div>

             <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <label class="form-label" for="page-status">{{ $t('page.lbl_status') }}</label>
                <div class="form-check form-switch">
                  <input class="form-check-input" :value="status" :checked="status" name="status" id="category-status" type="checkbox" v-model="status" />
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
      <FormFooter></FormFooter>
    </div>
  </form>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { EDIT_URL, STORE_URL, UPDATE_URL } from '../constant/page'
import { useField, useForm } from 'vee-validate'

import { useModuleId, useRequest,useOnOffcanvasHide} from '@/helpers/hooks/useCrudOpration'
import * as yup from 'yup'
import { readFile } from '@/helpers/utilities'
import FormHeader from '@/vue/components/form-elements/FormHeader.vue'
import FormFooter from '@/vue/components/form-elements/FormFooter.vue'
import InputField from '@/vue/components/form-elements/InputField.vue'

// props
defineProps({
  createTitle: { type: String, default: '' },
  editTitle: { type: String, default: '' },
  defaultImage: { type: String, default: 'https://dummyimage.com/600x300/cfcfcf/000000.png' },
  customefield: { type: Array, default: () => [] }
})

const { getRequest, storeRequest, updateRequest, listingRequest } = useRequest()

onMounted(() => {

  setFormData(defaultData())
})

// Edit Form Or Create Form
const currentId = useModuleId(() => {
  if (currentId.value > 0) {
    getRequest({ url: EDIT_URL, id: currentId.value }).then((res) => res.status && setFormData(res.data))
  } else {
    setFormData(defaultData())
  }
})

// File Upload Function
const ImageViewer = ref(null)
const refInput = ref(null)
const fileUpload = async (e) => {
  let file = e.target.files[0]
  await readFile(file, (fileB64) => {
    ImageViewer.value = fileB64
  })
  feature_image.value = file
}

// Function to delete Images
const removeImage = () => {
  ImageViewer.value = null
  feature_image.value = null
  refInput.value = ''
  document.getElementById('feature_image').value = ''
}

/*
 * Form Data & Validation & Handeling
 */
// Default FORM DATA
const defaultData = () => {
  errorMessages.value = {}
  return {
    name: '',
    description: '',
    sequence: '',
    status: 1,
    feature_image: null

  }
}

//  Reset Form
const setFormData = (data) => {
  ImageViewer.value = data.feature_image
  resetForm({
    values: {
      name: data.name,
      description: data.description,
      sequence: data.sequence,
      status: data.status,
      feature_image: data.feature_image
    }
  })
}

// Reload Datatable, SnackBar Message, Alert, Offcanvas Close
const reset_datatable_close_offcanvas = (res) => {
  if (res.status) {
    window.successSnackbar(res.message)
    renderedDataTable.ajax.reload(null, false)
    bootstrap.Offcanvas.getInstance('#form-offcanvas').hide()
    setFormData(defaultData())
    removeImage()
  } else {
    window.errorSnackbar(res.message)
    errorMessages.value = res.all_message
  }
}

const validationSchema = yup.object({
  name: yup.string()
    .required('Title is a required field') ,

})

const { handleSubmit, errors, resetForm } = useForm({
  validationSchema
})
const { value: name } = useField('name')
const { value: description } = useField('description')
const { value: sequence } = useField('sequence')
const { value: status } = useField('status')
const { value: feature_image } = useField('feature_image')
const errorMessages = ref({})


// Form Submit
const formSubmit = handleSubmit((values) => {
  if (currentId.value > 0) {
    updateRequest({ url: UPDATE_URL, id: currentId.value, body: values,type: 'file' }).then((res) => reset_datatable_close_offcanvas(res))
  } else {
    storeRequest({ url: STORE_URL, body: values,type: 'file' }).then((res) => reset_datatable_close_offcanvas(res))
  }
})

useOnOffcanvasHide('form-offcanvas', () => setFormData(defaultData()))

</script>
