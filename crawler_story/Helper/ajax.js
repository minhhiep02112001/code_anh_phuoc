const axios = require('axios');

// Phương thức GET
async function get(url) {
  try {
    const response = await axios.get(url);
    return response.data;
  } catch (error) {
    throw new Error(`Error during GET request: ${error.message}`);
  }
}

// Phương thức POST
async function post(url, data) {
  try {
    const response = await axios.post(url, data);
    return response.data;
  } catch (error) {
    throw new Error(`Error during POST request: ${error.message}`);
  }
}

// Phương thức PUT
async function put(url, data) {
  try {
    const response = await axios.put(url, data);
    return response.data;
  } catch (error) {
    throw new Error(`Error during PUT request: ${error.message}`);
  }
}

// Phương thức DELETE
async function del(url) {
  try {
    const response = await axios.delete(url);
    return response.data;
  } catch (error) {
    throw new Error(`Error during DELETE request: ${error.message}`);
  }
}

module.exports = {
  get,
  post,
  put,
  del,
};