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

        container.prepend(`<div class="dev-card-header"></div>`);
        container.children(".dev-card-header").append(`<img src=${avatar_url} alt="${name}"/>`);
        container.children(".dev-card-header").append(`<h5>${name}</h5>`);
        container.children(".dev-card-header").after(`<p><strong>Location: </strong>${location}</p>`);
        container.children(".dev-card-header").after(`<p><strong>Bio: </strong>${bio}</p>`);
        container.children('#dev-email').after(`<a href=${url}>See gitHub</a>`);
      },
    });
  });
});