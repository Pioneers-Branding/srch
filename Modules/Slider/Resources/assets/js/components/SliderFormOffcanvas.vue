<template>
  <form @submit="formSubmit">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="form-offcanvas" aria-labelledby="form-offcanvasLabel">
      <FormHeader :currentId="currentId" :editTitle="editTitle" :createTitle="createTitle"></FormHeader>
      <div class="offcanvas-body">
        <!-- <InputField class="col-md-12" type="text"  :label="$t('slider.lbl_name')" placeholder="" v-model="name" :error-message="errors['name']" :error-messages="errorMessages['name']"></InputField>
        <InputField class="col-md-12" type="text"  :label="$t('slider.lbl_link')" placeholder="" v-model="link"></InputField> -->

        <div class="form-group" >
              <label for="description" class="form-label">{{$t('Name')}}</label>
              <!-- <textarea id="description" name="description" rows="4" cols="50" v-model="description"></textarea> -->
               <!-- Add Quill editor here -->
                  <div ref="descriptionEditorRef" :placeholder="$t('page.enter_decsription')"></div>
                    <span v-if="errorMessages['description']">
                      <ul class="text-danger">
                        <li v-for="err in errorMessages['description']" :key="err">{{ err }}</li>
                      </ul>
                    </span>
                    <span class="text-danger">{{ errors.description }}</span>
        </div>

        <!-- <div class="col-12">
          <div class="form-group">
            <label class="form-label">{{ $t('slider.lbl_type') }}</label>
            <Multiselect id="type" v-model="type" :value="type" v-bind="singleSelectOption" :options="module_types.options" @select="linkSelect" class="form-group"></Multiselect>
            <span class="text-danger">{{ errors.type }}</span>
          </div>
        </div> -->

        <!-- <div class="col-12">
          <div class="form-group">
            <label class="form-label">{{ $t('slider.lbl_link_id') }}</label>
            <Multiselect id="link_id" v-model="link_id" :value="link_id" v-bind="singleSelectOption" :options="modules_data.options" @select="subCategorySelect" class="form-group"></Multiselect>
            <span class="text-danger">{{ errors.link_id }}</span>
          </div>
        </div> -->

        <!-- <div class="col-12" v-if="modules_data_sub.options.length> 0">
          <div class="form-group">
            <label class="form-label">{{ $t('Sub Category') }}</label>
            <Multiselect id="sub_id" v-model="sub_id" :value="sub_id" v-bind="singleSelectOption" :options="modules_data_sub.options" class="form-group"></Multiselect> 
            <span class="text-danger">{{ errors.sub_id }}</span>
          </div>
        </div> -->

      
        <!-- <div class="col-12">
          <div class="form-group">
            <label class="form-label">{{ $t('Banner For') }}</label>
            <Multiselect id="banner_type" v-model="banner_type" :value="banner_type" v-bind="singleSelectOption" :options="banner_types.options"  class="form-group"></Multiselect>
            <span class="text-danger">{{ errors.banner_type }}</span>
          </div>
        </div> -->

        <div class="form-group col-md-12">

          <div class="text-center">
                <img :src="ImageViewer || defaultImage" alt="feature-image" class="img-fluid mb-2 avatar-140 avatar-rounded" />
          </div>
          <label class="form-label" for="feature_image">{{ $t('slider.lbl_feature_image') }}</label>
          <input type="file" class="form-control" id="feature_image" ref="refInput"  @change="fileUpload" accept=".jpeg, .jpg, .png, .gif" />
          <span v-if="errorMessages['feature_image']">
            <ul class="text-danger">
              <li v-for="err in errorMessages['feature_image']" :key="err">{{ err }}</li>
            </ul>
          </span>
          <span class="text-danger">{{ errors.feature_image }}</span>
        </div>

        <div class="form-group d-none">
          <div class="d-flex justify-content-between align-items-center">
            <label class="form-label" for="slider-status">{{ $t('slider.lbl_status') }}</label>
            <div class="form-check form-switch">
              <input class="form-check-input" :value="status" :checked="status" name="status" id="slider-status" type="checkbox" v-model="status" />
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
import { CATEGORY_LIST, SUBCATEGORY_LIST, SERVICE_LIST, TYPE_LIST, STORE_URL, EDIT_URL, UPDATE_URL } from '../constant/slider'
import { useField, useForm } from 'vee-validate'
import InputField from '@/vue/components/form-elements/InputField.vue'
import { useModuleId, useRequest,useOnOffcanvasHide } from '@/helpers/hooks/useCrudOpration'
import * as yup from 'yup'
import { readFile } from '@/helpers/utilities'
import FormHeader from '@/vue/components/form-elements/FormHeader.vue'
import FormFooter from '@/vue/components/form-elements/FormFooter.vue'
import { useSelect } from '@/helpers/hooks/useSelect'


import 'quill/dist/quill.core.css';
import 'quill/dist/quill.snow.css';

import Quill from 'quill'; // Import Quill


// ... (rest of the setup code) ...

const descriptionEditorRef = ref(null);

// Quill setup
let quillInstance;

// props
defineProps({
  createTitle: { type: String, default: '' },
  editTitle: { type: String, default: '' },
  defaultImage: { type: String, default: 'https://dummyimage.com/600x300/cfcfcf/000000.png' },
  customefield: { type: Array, default: () => [] }
})

const { getRequest, storeRequest, updateRequest, listingRequest } = useRequest()

onMounted(() => {
  quillInstance = new Quill(descriptionEditorRef.value, {
    theme: 'snow', // Choose the theme. 'snow' provides a standard toolbar.
    // Add more configuration options here if needed.
  });
  // Bind the Quill editor content to the 'description' data property
  quillInstance.on('text-change', () => {
    description.value = quillInstance.root.innerHTML;
  });
  setFormData(defaultData())
})

const singleSelectOption = ref({
  closeOnSelect: true,
  searchable: true,
  clearable: false
})

const banner_types = ref({
  searchable: true,
  createOption: true,
  closeOnSelect: true,
  options: []
})

const module_types = ref({ options: [], list: [] })
const modules_data = ref({ options: [], list: [] })
const modules_data_sub = ref({ options: [], list: [] })
const errorMessages = ref({})

useOnOffcanvasHide('form-offcanvas', () => setFormData(defaultData()))

onMounted(() => {
  useSelect({ url: TYPE_LIST }, { value: 'id', label: 'name' }).then((data) => {
    module_types.value = data;

    banner_types.value.options = [
      {'value': 'top', 'label': 'Top'},
      {'value': 'bottom', 'label': 'Bottom'},
      {'value': 'offer', 'label': 'Offer'}
    ];
    
    // console.log(banner_types.value.options);
  });
});


const getList = () => {
  const typeId = type.value
  if (typeId === 'category') {
    getCategoryLIst()
  } else if (typeId === 'service') {
    getServiceList()
  }
}

const getServiceList = () => {
  useSelect({ url: SERVICE_LIST, data: { type: type.value } }, { value: 'id', label: 'name' }).then((data) => (modules_data.value = data))
}

const getCategoryLIst = () => {
  useSelect({ url: CATEGORY_LIST, data: { type: type.value } }, { value: 'id', label: 'name' }).then((data) => (modules_data.value = data))
}

const subCategorySelect = () => {
  const typeId = type.value 
  if (typeId === 'category') {
      subCategoryList()
  }
}

const subCategoryList = () => {
  useSelect({ url: SUBCATEGORY_LIST, data: { type: link_id.value } } , { value: 'id', label: 'name' } ).then((data) => (modules_data_sub.value = data))
}
const linkSelect = () => {
  getList()
}
const currentId = useModuleId(() => {
  if (currentId.value > 0) {
    getRequest({ url: EDIT_URL, id: currentId.value }).then((res) => {
      if(res.status) {
        // console.log(res.data) 
        setFormData(res.data)
        linkSelect()
        subCategorySelect()
      }
    })
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


// Default FORM DATA
const defaultData = () => {
  errorMessages.value = {}
  return {
    name: '',
    description : '',
    type: '',
    banner_type: '',
    link: '',
    link_id: '',
    sub_id:'',
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
      description:data.description,
      type: data.type,
      banner_type: data.banner_type,
      link: data.link,
      link_id: data.link_id,
      sub_id:data.sub_id,
      status: data.status,
      feature_image: data.feature_image
    }
  });
  // Manually set Quill editor content for the description field
  if (quillInstance) {
    quillInstance.root.innerHTML = data.description || ''; // Set to empty if no description
  }
}

const numberRegex = /^\d+$/
const validationSchema = yup.object({
  // name: yup
  //   .string()
  //   .required('Name is a required field')
  //   .test('is-string', 'Only strings are allowed', (value) => !numberRegex.test(value)),
  // type: yup.string().required('Type is a required field'),
  // link_id: yup.string().required("Link Id is a required field")
})

const { handleSubmit, errors, resetForm } = useForm({
  validationSchema
})

const { value: name } = useField('name')
const { value: description } = useField('description')
const { value: link } = useField('link')
const { value: type } = useField('type')
const { value: banner_type } = useField('banner_type')
const { value: link_id } = useField('link_id') 
const { value: sub_id } = useField('sub_id')
const { value: status } = useField('status')
const { value: feature_image } = useField('feature_image')

// Form Submit
const formSubmit = handleSubmit((values) => {
  if (currentId.value > 0) {
    updateRequest({ url: UPDATE_URL, id: currentId.value, body: values, type: 'file' }).then((res) => reset_datatable_close_offcanvas(res))
  } else {
    storeRequest({ url: STORE_URL, body: values, type: 'file' }).then((res) => reset_datatable_close_offcanvas(res))
  }
})

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

</script>
