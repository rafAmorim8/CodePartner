$(document).ready(function () {
  $("#devsContainer").children().each(function () {
    let user = $(this).attr('name');
    let container = $(this);
    let avatar_url, name, bio, location, url, blog;

    $.ajax({
      type: 'GET',
      url: `https://api.github.com/users/${user}`,
      dataType: 'json',
      success: function (data) {
        console.log(data);
        avatar_url = data.avatar_url;
        name = data.name;
        bio = data.bio;
        location = data.location;
        url = data.html_url;

        container.append(`<img src=${avatar_url} alt="${name}"/>`);
        container.append(`<h5>${name}</h5>`);
        container.append(`<p><strong>Bio: </strong>${bio}</p>`);
        container.append(`<p><strong>Location: </strong>${location}</p>`);
        container.append(`<a href=${url}>GitHub</a>`);
      }
    });

  });
});