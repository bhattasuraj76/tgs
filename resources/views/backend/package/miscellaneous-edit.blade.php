    <div class="row">
        <!-- holiday styles -->
        <div class="col-6">
            <div class="form-group row">
                <label for="is_family_holiday" class="col-lg-6 col-form-label">Family Holiday</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_family_holiday" id="is_family_holiday" value="1" @if($packageData->holidaystyle->is_family_holiday == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_trek_hike" class="col-lg-6 col-form-label">Trek & Hike </label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_trek_hike" id="is_trek_hike" value="1" @if($packageData->holidaystyle->is_trek_hike == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_extreme_adventure" class="col-lg-6 col-form-label">Extreme Adventures</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_extreme_adventure" id="is_extreme_adventure" value="1" @if($packageData->holidaystyle->is_extreme_adventure == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_best_of_himalyaya" class="col-lg-6 col-form-label">Best of Himalaya</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_best_of_himalyaya" id="is_best_of_himalyaya" value="1" @if($packageData->holidaystyle->is_best_of_himalyaya == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_luxury_holiday" class="col-lg-6 col-form-label">Luxury Holidays</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_luxury_holiday" id="is_luxury_holiday" value="1" @if($packageData->holidaystyle->is_luxury_holiday == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_wildlife_safari" class="col-lg-6 col-form-label">Wildlife Safari</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_wildlife_safari" id="is_wildlife_safari" value="1" @if($packageData->holidaystyle->is_wildlife_safari == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_culture_heritage" class="col-lg-6 col-form-label"> Culture & Heritage</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_culture_heritage" id="is_culture_heritage" value="1" @if($packageData->holidaystyle->is_culture_heritage == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_off_the_beaten_path" class="col-lg-6 col-form-label">Off The Beaten Path</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_off_the_beaten_path" id="is_off_the_beaten_path" value="1" @if($packageData->holidaystyle->is_off_the_beaten_path == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_active_adventure" class="col-lg-6 col-form-label">Active Adventures</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_active_adventure" id="is_active_adventure" value="1" @if($packageData->holidaystyle->is_active_adventure == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_ecofriendly_trek" class="col-lg-6 col-form-label">Eco Friendly Trek</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_ecofriendly_trek" id="is_ecofriendly_trek" value="1" @if($packageData->holidaystyle->is_ecofriendly_trek == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>

        </div>
        <!-- holiday styles -->

        <!-- specials -->
        <div class="col-6">
            <div class="form-group row">
                <label for="is_honeymoon_package" class="col-lg-6 col-form-label">Honeymoon Package</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_honeymoon_package" id="is_honeymoon_package" value="1" @if($packageData->special->is_honeymoon_package == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_photography_tour" class="col-lg-6 col-form-label">Photography Tour </label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_photography_tour" id="is_photography_tour" value="1" @if($packageData->special->is_photography_tour == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_student_trip" class="col-lg-6 col-form-label">Student Trip</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_student_trip" id="is_student_trip" value="1" @if($packageData->special->is_student_trip == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_filming_documentary" class="col-lg-6 col-form-label">Filming Documentary</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_filming_documentary" id="is_filming_documentary" value="1" @if($packageData->special->is_filming_documentary == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_gay_lesbian_trek_tour" class="col-lg-6 col-form-label">Gay & Lesbian Treks & Tours</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_gay_lesbian_trek_tour" id="is_gay_lesbian_trek_tour" value="1" @if($packageData->special->is_gay_lesbian_trek_tour == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_meeting_conference" class="col-lg-6 col-form-label">Meeting Conference</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_meeting_conference" id="is_meeting_conference" value="1" @if($packageData->special->is_meeting_conference == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_festival_tour" class="col-lg-6 col-form-label"> Festival Tour</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_festival_tour" id="is_festival_tour" value="1" @if($packageData->special->is_festival_tour == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_bird_watching" class="col-lg-6 col-form-label">Bird Watching</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_bird_watching" id="is_bird_watching" value="1" @if($packageData->special->is_bird_watching == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_last_minute_departure" class="col-lg-6 col-form-label">Last Minute Departure</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_last_minute_departure" id="is_last_minute_departure" value="1" @if($packageData->special->is_last_minute_departure == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_overland_tour" class="col-lg-6 col-form-label">Overland Tour</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_overland_tour" id="is_overland_tour" value="1" @if($packageData->special->is_overland_tour == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_food_tour" class="col-lg-6 col-form-label">Food Tour</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_food_tour" id="is_food_tour" value="1" @if($packageData->special->is_food_tour == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="is_buddha_footstep" class="col-lg-6 col-form-label">Buddha Footstep</label>
                <div class="col-lg-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_buddha_footstep" id="is_buddha_footstep" value="1" @if($packageData->special->is_buddha_footstep == 1){{"checked"}} @endif>
                    </label>
                </div>
            </div>
        </div>
        <!-- specials -->
    </div>