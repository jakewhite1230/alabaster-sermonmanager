<style>
  .asm-tax-body{
    background:#f5f5f5;
    font-family: 'Source Sans Pro', sans-serif;
    width: 75%;
    margin: auto;
    display: block;
    position: relative;
    min-height: 185px;
    height: auto;
    margin-bottom: 10px;
  }

  .asm-tax-body a:hover{
    text-decoration: none;
  }
  .asm-tax-body .clearfix:after {
     visibility: hidden;
     display: block;
     font-size: 0;
     content: " ";
     clear: both;
     height: 0;
     }
  .asm-tax-body .clearfix { display: inline-block; }
  /* start commented backslash hack \*/
  * html .asm-tax-body .clearfix { height: 1%; }
  .asm-tax-body .clearfix { display: block; }
  /* close commented backslash hack */
  .asm-tax-profile-image{
    width: 30%;
    height: auto;
    float: left;
    margin: 0px 15px 15px;
  }

  .asm-tax-content{
    float: left;
    width: 60%;
  }

  .asm-tax-name,
  .asm-listings-view-more{
    color: <?php echo $primary_style; ?>;
    margin-bottom: 0px !important;
    width: auto;
  }
  .asm-sermon-listing-link{
    color: <?php echo $secondary_style; ?>;
  }

  .asm-sermon-listing-link:hover{
    color: <?php echo $primary_style; ?>;
  }

  .asm-tax-description{
    font-size: .8em;
    font-style: italic;
    color: <?php echo $secondary_style; ?>;
  }

  .asm-tax-hr{
    margin-top: 10px;
    margin-bottom: 10px;
    border: 0;
    border-top: 1px solid <?php echo $secondary_style; ?>;
    opacity: 0.4;
  }

  @media(max-width:767px){
    .asm-tax-body{
      margin: auto;
      display: block;
      position: relative;
      padding: 10px;
      margin-bottom: 10px;
    }

    .asm-tax-body p{
    text-align: center;
    }

    .asm-tax-name{
      text-align: center;
    }
    .asm-tax-profile-image{
      width: 50%;
      height: auto;
      float: none;;
      margin: 0px auto;
      margin-bottom: 15px;
      display: block;
    }

    .asm-tax-content{
      float: none;;
      width: 100%;
    }
    .asm-tax-name,
    .asm-listings-view-more{
       width: 100%;
     }


    .asm-tax-hr{
      margin: 0 auto;
      display: block;
      width: 75%;
    }


  }
</style>
