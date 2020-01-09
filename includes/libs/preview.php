<div class="serp-mobile-elements">
									<div class="serp-button-collections-wrap">
									<div class="serp-button-collections">
										<ul>
											<!-- <li v-for="(element, index) in list1"  class="ca-share-button" v-bind:style="{ width: element.width+'%'}" style="padding:0"> -->
											<draggable v-model="list1" :options="{draggable:'.item'}" :move="checkMove">
											<li v-for="(element, index) in list1"  class="ca-share-button item waves-effect" style="padding:0" :id="element.id" v-if="!element.atSecondaryPanel">

												<a :href="element.link_path" :class="element.class" v-on:click="setcurrentItem(element)" v-if="
													element.type=='custom' || 
													element.type=='fb_share' || 
													element.type=='twitter_share' || 
													element.type=='fb_messenger' || 
													element.type=='google_share' || 
													element.type=='pinterest_share' || 
													element.type=='linkedin_share' || 
													element.type=='digg_share' || 
													element.type=='tumblr_share' || 
													element.type=='reddit_share' || 
													element.type=='yahoo_share'
													">
													<div class="ca_button_content"> 
														<span class = "fa " v-bind:class="element.icon" v-if="element.display_icon"></span>
														<span class = "ca_btn_text"  v-if="element.display_text">{{element.link_text}}</span>
													</div>
												</a>

												<a :href="element.link_path" :class="element.class" v-on:click="setcurrentItem(element)" v-if="element.type=='toggle'">
													<div class="ca_button_content show-secondary"> 
														<span class = "fa " v-bind:class="element.icon" v-if="element.display_icon"></span>
														<span class = "ca_btn_text"  v-if="element.display_text">{{element.link_text}}</span>
													</div>
												</a>									

												<span :class="element.class" v-on:click="setcurrentItem(element)" v-if="element.type=='static_text'">
													<div class="ca_button_content"> 
														<span class = "fa " v-bind:class="element.icon" v-if="element.display_icon"></span>
														<span class = "ca_btn_text"  v-if="element.display_text">{{element.link_text}}</span>
													</div>
												</span>

												<span :class="element.class" class="countdown" v-on:click="setcurrentItem(element)" v-if="element.type=='count_down'">
													<div class="ca_button_content"> 
														<span class = "fa " v-bind:class="element.icon" v-if="element.display_icon"></span>
														<span class = "ca_btn_text serp-clock"  v-if="element.display_text">Timer Here</span>
													</div>
												</span>
											</li>
											</draggable>
											<ul class="serpwars-secondary-panel">
												<draggable v-model="list1" :options="{draggable:'.item'}" :move="checkMove">
												<li v-for="(element, index) in list1"  class="ca-share-button item waves-effect" style="padding:0" :id="element.id" v-if="element.atSecondaryPanel">

													<a :href="element.link_path" :class="element.class" v-on:click="setcurrentItem(element)" v-if="element.type=='custom' || 
													element.type=='fb_share' || 
													element.type=='twitter_share' || 
													element.type=='fb_messenger' || 
													element.type=='google_share' || 
													element.type=='pinterest_share' || 
													element.type=='linkedin_share' || 
													element.type=='digg_share' || 
													element.type=='tumblr_share' || 
													element.type=='reddit_share' || 
													element.type=='yahoo_share' 
													">
														<div class="ca_button_content"> 
															<span class = "fa " v-bind:class="element.icon" v-if="element.display_icon"></span>
															<span class = "ca_btn_text"  v-if="element.display_text">{{element.link_text}}</span>
														</div>
													</a>

													<a :href="element.link_path" :class="element.class" v-on:click="setcurrentItem(element)" v-if="element.type=='toggle'">
														<div class="ca_button_content"> 
															<span class = "fa " v-bind:class="element.icon" v-if="element.display_icon"></span>
															<span class = "ca_btn_text"  v-if="element.display_text">{{element.link_text}}</span>
														</div>
													</a>

													<span :class="element.class" v-on:click="setcurrentItem(element)" v-if="element.type=='static_text'">
														<div class="ca_button_content"> 
															<span class = "fa " v-bind:class="element.icon" v-if="element.display_icon"></span>
															<span class = "ca_btn_text"  v-if="element.display_text">{{element.link_text}}</span>
														</div>
													</span>

													<span :class="element.class" v-on:click="setcurrentItem(element)" v-if="element.type=='count_down'">
													<div class="ca_button_content"> 
														<span class = "fa " v-bind:class="element.icon" v-if="element.display_icon"></span>
														<span class = "ca_btn_text serp-clock"  v-if="element.display_text">Timer Here</span>
													</div>
													</span>

												</li>
												</draggable>
											</ul>
										</ul>
									</div>
								</div>
								</div>