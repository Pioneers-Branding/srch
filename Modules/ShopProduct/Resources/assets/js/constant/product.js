export const MODULE = 'shopproduct'
export const EDIT_URL = (id) => {return {path: `${MODULE}/${id}/edit`, method: 'GET'}}
export const STORE_URL = () => {return {path: `${MODULE}`, method: 'POST'}}
export const UPDATE_URL = (id) => {return {path: `${MODULE}/${id}`, method: 'POST'}}
export const CATEGORY_LIST = ({type = 'select',id = null}) => {return {path: `shopproduct/category_list?type=${type}&parent_id=${id}`, method: 'GET'}}

