$(document).ready(function () {
  $("#devsContainer").children().each(function () {
    let user = $(this).attr('name');
    let container = $(this);
    let avatar_url, name, bio, location, url, blog;

    // Makes a request to retrive data from the github api and display it in the dashboard page
    $.ajax({
      dataType: 'JSON',
      type: 'GET',
      url: `https://api.github.com/users/${user}`,
      success: function (data) {
        avatar_url = data.avatar_url;
        name = data.name;
        bio = data.bio;
        location = data.location;
        url = data.html_url;

        container.append(`<div class="dev-card-header"></div>`);
        container.children(".dev-card-header").append(`<img src=${avatar_url} alt="${name}"/>`);
        container.children(".dev-card-header").append(`<h5>${name}</h5>`);
        container.append(`<p><strong>Bio: </strong>${bio}</p>`);
        container.append(`<p><strong>Location: </strong>${location}</p>`);
        container.append(`<a href=${url}><img class="github-icon" src="./assets/github.svg" alt="Github icon">See gitHub</a>`);
      },
    });
  });
});