<?php 

// Include config file
require_once "config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/chunk-vendors.spa.css"/>
  <link rel="stylesheet" href="css/base.css"/>
  <link rel="icon" href="favicon.ico">
  <title>MPA</title>
</head>
<body>
  <div id="app" data-v-app="">
    <div class="v-application v-theme--light v-layout v-layout--full-height v-locale--is-ltr" data-app="true" id="app">
      <div class="v-application__wrap">
        <header class="v-app-bar v-app-bar--is-active v-app-bar--density-compact" data-v-128da662=""
          style="top: 0px; height: 48px; margin-left: 0px; margin-top: 0px; width: calc((100% - 0px) - 0px); z-index: 2; transform: translateY(0%);">
          
          <div class="v-app-bar__content">
            
            <header class="v-app-bar-title" to="/" data-v-128da662="">
              <div class="v-app-bar-title__placeholder">MPA</div>
            </header>
            <div class="flex-grow-1" data-v-128da662=""></div><a
              class="v-btn v-btn--active v-btn--elevated v-theme--light v-btn--density-default v-btn--size-default v-btn--variant-contained"
              href="dashboard.php" link="" data-v-128da662="">
              <div class="v-btn__overlay"></div>
              <div class="v-btn__underlay"></div>
              Dashboard
              
            </a>
            <a
              class="v-btn v-btn--elevated v-theme--light v-btn--density-default v-btn--size-default v-btn--variant-contained mr-3"
              href="<?= SPA_HOST; ?>/spa/#/accounts" data-v-128da662="">
              <div class="v-btn__overlay"></div>
              <div class="v-btn__underlay"></div>
              Accounts
              
            </a>
            <hr class="v-divider v-divider--inset v-divider--vertical v-theme--light" aria-orientation="vertical"
              role="separator" data-v-128da662="" style="border-width: 0;">

            <a href="login.php?logout" class="v-badge v-badge--bordered mr-3" data-v-128da662="">
              <div class="v-badge__wrapper">
                <button type="button"
                  class="btn-logout v-btn v-theme--light bg-error v-btn--density-default v-btn--size-default v-btn--variant-contained"
                  data-v-128da662=""
                  href="login.php?logout"
                >
                  <div class="v-btn__overlay"></div>
                  <div class="v-btn__underlay"></div>
                  <span data-v-128da662=""><?= $_SESSION['username']; ?></span>
                </button>
                <span class="btn-logout-icon v-badge__badge bg-error" aria-atomic="true" aria-label="locale string here" aria-live="polite" role="status" style="inset: auto auto calc(100% - 12px) calc(100% - 12px);">
                  <i class="mdi-exit-to-app mdi v-icon notranslate v-icon--size-default" aria-hidden="true"></i>
                </span>
              </div>
            </a>
            
          </div>
          
        </header>
        <main class="v-main" style="position: relative; padding: 48px 0px 0px;">
          <div class="v-main__wrap">
            <div class="v-container">
              <div class="v-card v-theme--light v-card--density-default elevation-10 v-card--variant-contained ma-10">
                <div class="v-card__underlay"></div>
                <div class="v-card-header">
                  <div class="v-card-header-text">
                    <div class="v-card-title">Dashboard item 1</div>
                    <div class="v-card-subtitle">Description of dashboard item 1</div>
                  </div>
                </div>
                <div class="v-card-actions">
                  <button type="button"
                    class="v-btn v-theme--light v-btn--density-default v-btn--rounded v-btn--size-default v-btn--variant-outlined"
                    text="">
                    <div class="v-btn__overlay"></div>
                    <div class="v-btn__underlay"></div>Button
                  </button>
                </div>
              </div>
              <div class="v-card v-theme--light v-card--density-default elevation-10 v-card--variant-contained ma-10">
                <div class="v-card__underlay"></div>
                <div class="v-card-header">
                  <div class="v-card-header-text">
                    <div class="v-card-title">Dashboard item 2</div>
                    <div class="v-card-subtitle">Description of dashboard item 2</div>
                  </div>
                </div>
                <div class="v-card-actions">
                  <button type="button"
                    class="v-btn v-theme--light v-btn--density-default v-btn--rounded v-btn--size-default v-btn--variant-outlined"
                    text="">
                    <div class="v-btn__overlay"></div>
                    <div class="v-btn__underlay"></div>Button
                  </button>
                </div>
              </div>
              <div class="v-card v-theme--light v-card--density-default elevation-10 v-card--variant-contained ma-10">
                <div class="v-card__underlay"></div>
                <div class="v-card-header">
                  <div class="v-card-header-text">
                    <div class="v-card-title">Dashboard item 3</div>
                    <div class="v-card-subtitle">Description of dashboard item 3</div>
                  </div>
                </div>
                <div class="v-card-actions">
                  <button type="button"
                    class="v-btn v-theme--light v-btn--density-default v-btn--rounded v-btn--size-default v-btn--variant-outlined"
                    text="">
                    <div class="v-btn__overlay"></div>
                    <div class="v-btn__underlay"></div>Button
                  </button>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</body>
</html>