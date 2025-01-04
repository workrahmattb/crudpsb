{pkgs}: {
  channel = "stable-24.05";
  packages = [
    pkgs.nodejs_20
    pkgs.php83
  ];
  services.mysql = {
  enable = true;
  package = pkgs.mariadb;
};
  idx.extensions = [
    "svelte.svelte-vscode"
    "vue.volar"
    "cweijan.dbclient-jdbc"
    "cweijan.vscode-mysql-client2"
  ];
  idx.previews = {
    previews = {
      web = {
        command = [
          "npm"
          "run"
          "dev"
          "--"
          "--port"
          "$PORT"
          "--host"
          "0.0.0.0"
        ];
        manager = "web";
      };
    };
  };
}