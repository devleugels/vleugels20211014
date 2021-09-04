import Errors from './Errors'

class Form{
  constructor(data){
    this.originalData = data;

    for (let field in data){
      this[field] = data[field];
    }

    this.errors = new Errors();
  }

  data(){
    let data = {}; //Object.assign({},this);
    //delete data.originalData;
    //delete data.errors;
    for (let property in this.originalData){
      data[property] = this[property];
    }
    return data;
  }

  reset(){
    for (let field in this.originalData){
      this[field] = '';
    }

    this.errors.clear();
  }

/*
  post(url){
    return this.submit('post',url);
  }

  put(url){
    return this.submit('put',url);
  }

  patch(url){
      return new Promise((resolve, reject) => {
      axios.post(url, { data: this.data(), _method: 'patch'})
          .then(response => {
              this.onSuccess(response.data);
              resolve(response.data);
          })
          .catch(error => {
              this.onFail(error.response.data.errors);
              reject(error.response.data);
          });
  });
  }

  delete(url){
    return this.submit('delete',url);
  }

  submit(requestType, url){

  return new Promise((resolve, reject) => {
      axios[requestType](url, this.data())
          .then(response => {
              this.onSuccess(response.data);

              resolve(response.data);
          })
          .catch(error => {
              this.onFail(error.response.data.errors);

              reject(error.response.data);
          });
  });

  }
*/ 
  post(url){
    return this.submit('post', url);
  }
  
  put(url){
    return this.submit('put', url);
  }
  
  patch(url){
    return this.submit('patch', url);
  }
  
  delete(url){
    return this.submit('delete', url);
  }
  
  submit(requestType, url){
    // hier Form.js axios entry
    return new Promise((resolve, reject) => {
      axios.post(url, { data: this.data(), _method: requestType})
         .then( response => {
           this.onSuccess(response.data);
           resolve(response.data);
         })
         .catch(error => {
           this.onFail(error.response.data.errors);
           reject(error.response.data);
         })
    });
  }
  
  onSuccess(data){
    this.reset();
  }

  onFail(errors){
    this.errors.record(errors)
  }
};

export default Form;
