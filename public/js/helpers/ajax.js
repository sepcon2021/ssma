export function ajax(props) {
  let { url, cbSuccess } = props;

  fetch(url)
    .then((res) => (res.ok ? res.json() : Promise.reject(res)))
    .then((json) => cbSuccess(json))
    .catch((err) => {
      let message = err.statusText || "Ocurrió un error al accedes a la API";
      console.log(err);
    });
}

export function ajaxPost(props) {
  let { url, body, cbSuccess } = props;

  fetch(url, { method: "POST", body: body })
    .then((res) => (res.ok ? res.json() : Promise.reject(res)))
    .then((json) => cbSuccess(json))
    .catch((err) => {
      console.log(err);
    });
}

export function ajaxNormal(props) {
  let { url, body, cbSuccess } = props;

  fetch(url, { method: "POST", body: body })
    .then((res) => (res.ok ? res.text() : Promise.reject(res)))
    .then((json) => cbSuccess(json))
    .catch((err) => {
      console.log(err);
    });
}
