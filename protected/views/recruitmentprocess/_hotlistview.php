<?php
/* @var $this RecruitmentprocessController */
/* @var $data Hotlist */
?>

<div class="view">

<div class="row">
  <div class="col-md-2">
            <a href="<?php echo Yii::app()->baseUrl."/".CHtml::encode($data->cv->pathToPdf); ?>" title="Öppna cv" class="thumbnail"><img src="<?php echo Yii::app()->baseUrl;?>/img/CVicon.png" /></a>
        </div>
  <div class="col-md-2">
  	<ul class="meta-search">
           <li><i class="glyphicon glyphicon-calendar"></i> <span><?php echo substr(CHtml::encode($data->cv->date),0,10); ?></span></li>
           <li><i class="glyphicon glyphicon-briefcase"></i> <span><?php echo CHtml::encode($data->cv->typeOfEmployment); ?></span></li>
            <?php
            //DB Query to get the country name.
            if(isset($data->cv->geographicArea->country)){
                $countryName = $data->cv->geographicArea->country;
            }else
                $countryName = null;
            ?>
            <li><i class="glyphicon glyphicon-globe"></i> <span><?= $countryName; ?></span></li>
           <li><i class="glyphicon glyphicon-user"></i> <span><?php echo CHtml::encode($data->cv->publisher->username); ?></span></li>
        </ul>

  </div>

  <div class="col-md-4">
    <div class="row lead" >
        <div id="stars" class="starrr" style='font-size: 20px'></div>
         <div style='font-size: 15px'>
          <span class="plus"><a href="<?php echo $this->createUrl('/message/compose/'.$data->cv->publisher->id);?>" title="<?php echo Yii::t("t","Öppna chatt");?>"><i class="glyphicon glyphicon-comment"></i></a></span><span><?php echo Yii::t("t"," Starta chatt");?></span>
          <span class="plus"><a href="#" title="Enkät utsänd/besvarad"><i class="glyphicon glyphicon-file"></i></a></span><span><?php echo Yii::t("t"," Enkät");?></span>
        </div>
	</div>

</div>
  <div class="col-md-3">
  	<h3>
      <a href="<?php echo $data->cv->pathToPdf;?>" title="se på cvt">
      <?php echo CHtml::encode($data->cv->title);?>
      </a>
    </h3>
  </div>

  <div class="col-md-1">
<!--        --><?php //$this->widget('yiiwheels.widgets.switch.WhSwitch', array('name' => 'switchbutton', 'id' => $data->cv->id));?>
      <input id="<?php echo $data->cv->id;?>" name="switchbutton" type="checkbox" value="1" data-title="<?php echo $data->cv->title?>">
  </div>

</div>
</div>
<script>
// Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function($, window) {
  var Starrr;

  Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      numStars: 5,
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      var i, _, _ref,
        _this = this;

      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      _ref = this.defaults;
      for (i in _ref) {
        _ = _ref[i];
        if (this.$el.data(i) != null) {
          this.options[i] = this.$el.data(i);
        }
      }
      this.createStars();
      this.syncRating();
      this.$el.on('mouseover.starrr', 'span', function(e) {
        return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('mouseout.starrr', function() {
        return _this.syncRating();
      });
      this.$el.on('click.starrr', 'span', function(e) {
        return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('starrr:change', this.options.change);
    }

    Starrr.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
      }
      return _results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('starrr:change', rating);
    };

    Starrr.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        }
      }
      if (!rating) {
        return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
      }
    };

    return Starrr;

  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = $(this).data('star-rating');
        if (!data) {
          $(this).data('star-rating', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

$(function() {
  return $(".starrr").starrr();
});

$( document ).ready(function() {
      
  $('#stars').on('starrr:change', function(e, value){
    $('#count').html(value);
  });
  
  $('#stars-existing').on('starrr:change', function(e, value){
    $('#count-existing').html(value);
  });
});
</script>
